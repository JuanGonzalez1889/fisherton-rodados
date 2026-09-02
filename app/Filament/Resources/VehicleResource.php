<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Vehículos';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    protected static ?string $modelLabel = 'Vehículo';

    protected static ?string $pluralModelLabel = 'Vehículos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información Básica')
                    ->schema([
                        Forms\Components\TextInput::make('brand')
                            ->label('Marca')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('model')
                            ->label('Modelo')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('year')
                            ->label('Año')
                            ->required()
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(date('Y') + 1),
                        Forms\Components\TextInput::make('price')
                            ->label('Precio')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                    ])->columns(2),

                Forms\Components\Section::make('Detalles Técnicos')
                    ->schema([
                        Forms\Components\TextInput::make('kilometers')
                            ->label('Kilómetros')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Forms\Components\Select::make('fuel_type')
                            ->label('Combustible')
                            ->options([
                                'nafta' => 'Nafta',
                                'diesel' => 'Diesel',
                                'gnc' => 'GNC',
                                'electrico' => 'Eléctrico',
                                'hibrido' => 'Híbrido',
                            ])
                            ->required(),
                        Forms\Components\Select::make('transmission')
                            ->label('Transmisión')
                            ->options([
                                'manual' => 'Manual',
                                'automatica' => 'Automática',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('color')
                            ->label('Color')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Descripción')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Descripción')
                            ->rows(17)
                            ->columnSpanFull()
                            ->extraAttributes(['style' => 'min-height: 400px;'])
                    ]),

            Forms\Components\Section::make('Imágenes')
                ->schema([
                    Forms\Components\Repeater::make('vehicleImages')
                        ->relationship('vehicleImages')
                        ->schema([
                            Forms\Components\FileUpload::make('url')
                                ->label('Imagen')
                                ->image()
                                ->disk('public')
                                ->directory('vehicles')
                                ->visibility('public')
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->acceptedFileTypes(['image/*'])
                                ->extraInputAttributes([
                                    'accept' => 'image/*',
                                ])
                                ->helperText('Solo una imagen puede ser principal. Al guardar, solo la última marcada quedará activa.')
                                ->columnSpanFull()
                                ->required(),
                            Forms\Components\Toggle::make('is_main')
                                ->label('Principal')
                                ->inline(false)
                                ->default(false)
                                ->afterStateUpdated(function ($state, callable $set, $get, $context) {
                                    if ($state) {
                                        $images = $get('vehicleImages') ?? [];
                                        foreach ($images as $index => $image) {
                                            if ($index !== $context['index']) {
                                                $set("vehicleImages.{$index}.is_main", false);
                                            }
                                        }
                                    }
                                }),
                        ])
                        ->label('Imágenes')
                        ->minItems(1)
                        ->maxItems(10)
                        ->defaultItems(1)
                        ->columnSpanFull()
                        ->helperText('Agrega múltiples imágenes con “Add to Imágenes”. Solo una puede ser principal.'),
                ]),

                Forms\Components\Section::make('Clasificación')
                    ->schema([
                        Forms\Components\Select::make('category')
                            ->label('Categoría')
                            ->options([
                                'auto' => 'Auto',
                                'suv' => 'SUV',
                                'pickup' => 'Pickup',
                                'comercial' => 'Comercial',
                                'moto' => 'Moto',
                            ])
                            ->required(),
                        Forms\Components\Toggle::make('featured')
                            ->label('Destacado')
                            ->default(false),
                        Forms\Components\Toggle::make('available')
                            ->label('Disponible')
                            ->default(true),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')
                    ->label('Imagen')
                    ->circular(),
                Tables\Columns\TextColumn::make('brand')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model')
                    ->label('Modelo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Año')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Precio')
                    ->money('ARS')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoría')
                    ->badge()
                    ->colors([
                        'primary' => 'auto',
                        'success' => 'suv',
                        'warning' => 'pickup',
                        'danger' => 'comercial',
                        'info' => 'moto',
                    ]),
                Tables\Columns\IconColumn::make('featured')
                    ->label('Destacado')
                    ->boolean(),
                Tables\Columns\IconColumn::make('available')
                    ->label('Disponible')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Categoría')
                    ->options([
                        'auto' => 'Auto',
                        'suv' => 'SUV',
                        'pickup' => 'Pickup',
                        'comercial' => 'Comercial',
                        'moto' => 'Moto',
                    ]),
                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Destacado'),
                Tables\Filters\TernaryFilter::make('available')
                    ->label('Disponible'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Editar'),
                Tables\Actions\DeleteAction::make()
                    ->label('Eliminar'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'vehículo';
    }

    public static function getPluralModelLabel(): string
    {
        return 'vehículos';
    }
}
