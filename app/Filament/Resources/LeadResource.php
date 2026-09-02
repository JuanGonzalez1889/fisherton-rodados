<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers\NotasRelationManager;
use App\Models\Lead;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Clientes';

    protected static ?string $modelLabel = 'Cliente';

    protected static ?string $pluralModelLabel = 'Clientes';

    protected static ?string $navigationGroup = 'CRM';

    // Estados disponibles como constante reutilizable
    public const ESTADOS = [
        'NUEVO'      => 'Nuevo',
        'CONTACTAR'  => 'Contactar',
        'CONTACTADO' => 'Contactado',
        'INTERESADO' => 'Interesado',
        'VENDIDO'    => 'Vendido',
        'NO AVANZA'  => 'Perdido',
    ];

    public const ORIGENES = [
        'web'       => 'Web',
        'instagram' => 'Instagram',
        'facebook'  => 'Facebook',
        'sala de exposición'     => 'Sala de exposición',
        'referido'     => 'Referido',
        'otros'     => 'Otros',
    ];

    public static function form(Form $form): Form
    {
        $isAdmin = auth()->user()?->isAdmin();

        return $form
            ->schema([
                Forms\Components\Grid::make(['default' => 1, 'lg' => 3])
                    ->schema([
                        // Columna izquierda (2/3)
                        Forms\Components\Group::make([
                            Forms\Components\Section::make('Información del Cliente')
                                ->icon('heroicon-o-user')
                                ->schema([
                                    Forms\Components\TextInput::make('name')
                                        ->label('Nombre')
                                        ->required()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('apellido')
                                        ->label('Apellido')
                                        ->required()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('dni')
                                        ->label('DNI')
                                        ->required()
                                        ->maxLength(20)
                                        ->live(onBlur: true)
                                        ->hint(function ($state, $record): ?string {
                                            if (empty($state)) return null;
                                            $exists = Lead::where('dni', $state)
                                                ->when($record?->id, fn ($q) => $q->where('id', '!=', $record->id))
                                                ->exists();
                                            return $exists ? '⚠ Este DNI ya está registrado. Verificar antes de guardar.' : null;
                                        })
                                        ->hintColor('warning'),
                                    Forms\Components\TextInput::make('email')
                                        ->label('Email')
                                        ->email()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('phone')
                                        ->label('Teléfono')
                                        ->tel()
                                        ->required()
                                        ->maxLength(255),
                                ])->columns(['default' => 1, 'sm' => 3]),

                            Forms\Components\Section::make('Interés')
                                ->icon('heroicon-o-truck')
                                ->schema([
                                    Forms\Components\ToggleButtons::make('categoria_vehiculo')
                                        ->label('Tipo de vehículo')
                                        ->options([
                                            'auto' => 'Auto / Pickup',
                                            'moto' => 'Moto',
                                        ])
                                        ->icons([
                                            'auto' => 'heroicon-o-truck',
                                            'moto' => 'custom-moto',
                                        ])
                                        ->default('auto')
                                        ->inline()
                                        ->required(),

                                    Forms\Components\Select::make('tipo_vehiculo')
                                        ->label('¿El vehículo está en el stock?')
                                        ->options([
                                            'stock' => 'Sí, está en el stock',
                                            'otro'  => 'No, es otro vehículo',
                                        ])
                                        ->default('stock')
                                        ->live()
                                        ->dehydrated(false)
                                        ->afterStateHydrated(function ($set, $record) {
                                            if ($record && $record->otro_marca) {
                                                $set('tipo_vehiculo', 'otro');
                                            }
                                        })
                                        ->afterStateUpdated(function ($state, $set) {
                                            if ($state === 'otro') {
                                                $set('vehicle_id', null);
                                            } else {
                                                $set('otro_marca', null);
                                                $set('otro_modelo', null);
                                                $set('otro_anio', null);
                                            }
                                        }),

                                    Forms\Components\Select::make('vehicle_id')
                                        ->label('Vehículo del stock')
                                        ->relationship('vehicle', 'model',
                                            fn (Builder $query) => $query->select(['id', 'brand', 'model', 'year'])
                                        )
                                        ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->brand} {$record->model} ({$record->year})")
                                        ->searchable()
                                        ->preload()
                                        ->nullable()
                                        ->visible(fn ($get) => $get('tipo_vehiculo') !== 'otro'),

                                    Forms\Components\Grid::make(3)
                                        ->schema([
                                            Forms\Components\TextInput::make('otro_marca')
                                                ->label('Marca')
                                                ->placeholder('Ej: Toyota')
                                                ->required(),
                                            Forms\Components\TextInput::make('otro_modelo')
                                                ->label('Modelo')
                                                ->placeholder('Ej: Hilux')
                                                ->required(),
                                            Forms\Components\TextInput::make('otro_anio')
                                                ->label('Año')
                                                ->numeric()
                                                ->placeholder('Ej: 2021')
                                                ->minValue(1900)
                                                ->maxValue(date('Y') + 1)
                                                ->required(),
                                        ])
                                        ->visible(fn ($get) => $get('tipo_vehiculo') === 'otro'),


                                ])->columns(1),

                            Forms\Components\Section::make('Historial de notas')
                                ->icon('heroicon-o-chat-bubble-left-right')
                                ->schema([
                                    Forms\Components\Textarea::make('message')
                                        ->label('Agregar nota')
                                        ->placeholder('Ej: Contactar a las 21hs...')
                                        ->helperText('Al guardar, esta nota quedará registrada con la fecha y hora actual.')
                                        ->rows(3)
                                        ->columnSpanFull(),
                                    Forms\Components\Placeholder::make('notas_historial')
                                        ->label('')
                                        ->content(function (?Lead $record): \Illuminate\Support\HtmlString {
                                            if (!$record || !$record->exists) {
                                                return new \Illuminate\Support\HtmlString('');
                                            }
                                            $notes = $record->notas()->with('autor')->latest()->get();
                                            if ($notes->isEmpty()) {
                                                return new \Illuminate\Support\HtmlString(
                                                    '<p style="color:#64748b;font-size:13px;">Sin notas aún.</p>'
                                                );
                                            }
                                            $html = '';
                                            foreach ($notes as $nota) {
                                                $html .= '<div style="border-left:3px solid rgba(245,158,11,.5);padding:10px 14px;margin-bottom:10px;background:rgba(255,255,255,.03);border-radius:0 8px 8px 0;">';
                                                $html .= '<div style="display:flex;gap:10px;align-items:center;margin-bottom:6px;">';
                                                $html .= '<span style="font-size:11px;font-weight:700;color:#f59e0b;">' . e($nota->autor?->name ?? 'Sistema') . '</span>';
                                                $html .= '<span style="font-size:11px;color:#64748b;">' . $nota->created_at->format('d/m/Y H:i') . '</span>';
                                                $html .= '</div>';
                                                $html .= '<p style="font-size:13px;color:#f1f5f9;margin:0;white-space:pre-wrap;">' . nl2br(e($nota->contenido)) . '</p>';
                                                $html .= '</div>';
                                            }
                                            return new \Illuminate\Support\HtmlString($html);
                                        })
                                        ->visible(fn (?Lead $record): bool => $record !== null && $record->exists)
                                        ->columnSpanFull(),
                                ])
                                ->collapsible(),
                        ])->columnSpan(['default' => 1, 'lg' => 2]),

                        // Columna derecha (1/3)
                        Forms\Components\Group::make([
                            Forms\Components\Section::make('Estado del Pipeline')
                                ->icon('heroicon-o-chart-bar')
                                ->schema([
                                    Forms\Components\Select::make('status')
                                        ->label('Estado')
                                        ->options(self::ESTADOS)
                                        ->required()
                                        ->default('NUEVO')
                                        ->native(false),
                                    Forms\Components\Select::make('origen')
                                        ->label('Origen')
                                        ->options(self::ORIGENES)
                                        ->required()
                                        ->default('web')
                                        ->native(false),
                                    Forms\Components\DateTimePicker::make('ultima_hora_contacto')
                                        ->label('Último contacto')
                                        ->nullable()
                                        ->displayFormat('d/m/Y H:i'),
                                    // Solo admins pueden reasignar vendedor
                                    Forms\Components\Select::make('user_id')
                                        ->label('Vendedor asignado')
                                        ->options(User::pluck('name', 'id'))
                                        ->searchable()
                                        ->nullable()
                                        ->visible($isAdmin),
                                ]),
                        ])->columnSpan(['default' => 1, 'lg' => 1]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Stack::make([

                    // Fecha arriba, visible de un vistazo
                    Tables\Columns\TextColumn::make('ultima_hora_contacto')
                        ->label('Último contacto')
                        ->dateTime('d/m/Y H:i')
                        ->sortable()
                        ->placeholder('Sin contacto')
                        ->color('gray')
                        ->icon('heroicon-o-clock'),

                    Tables\Columns\Layout\Split::make([
                        Tables\Columns\TextColumn::make('name')
                            ->label('Nombre')
                            ->getStateUsing(fn (Lead $record): string =>
                                trim($record->name . ' ' . $record->apellido)
                            )
                            ->searchable(query: fn (Builder $query, string $search) =>
                                $query->where('name', 'like', "%{$search}%")
                                      ->orWhere('apellido', 'like', "%{$search}%")
                                      ->orWhere('dni', 'like', "%{$search}%")
                            )
                            ->sortable()
                            ->weight('bold')
                            ->size('lg'),
                        Tables\Columns\TextColumn::make('status')
                            ->label('Estado')
                            ->badge()
                            ->alignEnd()
                            ->color(fn (string $state): string => match ($state) {
                                'NUEVO'      => 'info',
                                'CONTACTAR'  => 'gray',
                                'CONTACTADO' => 'warning',
                                'INTERESADO' => 'primary',
                                'VENDIDO'    => 'success',
                                'NO AVANZA'  => 'danger',
                                default      => 'gray',
                            })
                            ->formatStateUsing(fn (string $state): string => self::ESTADOS[$state] ?? $state),
                    ]),

                    Tables\Columns\TextColumn::make('vehiculo_label')
                        ->label('Vehículo')
                        ->getStateUsing(fn (Lead $record): string =>
                            $record->vehicle
                                ? "{$record->vehicle->brand} {$record->vehicle->model} ({$record->vehicle->year})"
                                : ($record->otro_marca
                                    ? "{$record->otro_marca} {$record->otro_modelo} ({$record->otro_anio})"
                                    : '—')
                        )
                        ->icon(fn (Lead $record): string =>
                            $record->categoria_vehiculo === 'moto'
                                ? 'custom-moto'
                                : 'heroicon-o-truck'
                        )
                        ->color(fn (Lead $record): string =>
                            $record->categoria_vehiculo === 'moto' ? 'warning' : 'primary'
                        )
                        ->searchable(query: fn (Builder $query, string $search) =>
                            $query->whereHas('vehicle', fn ($q) =>
                                $q->where('brand', 'like', "%{$search}%")
                                  ->orWhere('model', 'like', "%{$search}%")
                            )
                        ),

                    Tables\Columns\Layout\Split::make([
                        Tables\Columns\TextColumn::make('phone')
                            ->label('Teléfono')
                            ->icon('heroicon-o-phone')
                            ->searchable()
                            ->copyable(),
                        Tables\Columns\TextColumn::make('dni')
                            ->label('DNI')
                            ->icon('heroicon-o-identification')
                            ->placeholder('Sin DNI')
                            ->color('gray'),
                        Tables\Columns\TextColumn::make('vendedor.name')
                            ->label('Vendedor')
                            ->badge()
                            ->color('primary')
                            ->icon('heroicon-o-user')
                            ->placeholder('Sin asignar')
                            ->alignEnd(),
                    ]),

                    Tables\Columns\TextColumn::make('origen')
                        ->label('Origen')
                        ->badge()
                        ->color('gray')
                        ->formatStateUsing(fn (string $state): string => self::ORIGENES[$state] ?? $state),

                ])->space(2),
            ])
            ->contentGrid([
                'default' => 1,
                'sm'      => 2,
                'xl'      => 3,
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Estado')
                    ->options(self::ESTADOS)
                    ->multiple(),
                Tables\Filters\SelectFilter::make('origen')
                    ->label('Origen')
                    ->options(self::ORIGENES),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Vendedor')
                    ->options(User::pluck('name', 'id')),
            ])
            ->actions([
                Tables\Actions\Action::make('whatsapp')
                    ->label('WhatsApp')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->action(function (Lead $record, $livewire): void {
                        $vendedor  = auth()->user()->name;
                        $cliente   = trim($record->name . ' ' . $record->apellido);
                        $vehiculo = $record->vehicle
                            ? strtoupper("{$record->vehicle->brand} {$record->vehicle->model} {$record->vehicle->year}")
                            : ($record->otro_marca
                                ? strtoupper("{$record->otro_marca} {$record->otro_modelo} {$record->otro_anio}")
                                : 'un vehículo');
                        $mensaje = urlencode(
                            "Hola {$cliente}, soy {$vendedor} de Fisherton Rodados. Te contacto por {$vehiculo}. ¿Seguís interesado?"
                        );
                        $numero = ltrim($record->phone, '+');
                        if (!str_starts_with($numero, '549')) {
                            $numero = '549' . ltrim($numero, '0');
                        }
                        $url = "https://wa.me/{$numero}?text={$mensaje}";

                        $record->update(['ultima_hora_contacto' => now()]);

                        $livewire->js("window.open('" . addslashes($url) . "', '_blank')");
                    }),
                Tables\Actions\EditAction::make()
                    ->visible(fn (Lead $record): bool =>
                        auth()->user()->isAdmin() || auth()->id() === $record->user_id
                    ),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn (): bool => auth()->user()->isAdmin()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn (): bool => auth()->user()->isAdmin()),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelationManagers(): array
    {
        return [
            NotasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit'   => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
