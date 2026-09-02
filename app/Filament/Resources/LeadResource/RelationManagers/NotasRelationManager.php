<?php

namespace App\Filament\Resources\LeadResource\RelationManagers;

use App\Models\LeadNote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class NotasRelationManager extends RelationManager
{
    protected static string $relationship = 'notas';

    protected static ?string $title = 'Notas del Pipeline';

    protected static ?string $modelLabel = 'Nota';

    protected static ?string $pluralModelLabel = 'Notas';

    public static function canViewAny(): bool
    {
        return true;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('contenido')
                    ->label('Nueva nota')
                    ->placeholder('Escribí una actualización del cliente...')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('contenido')
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('autor.name')
                    ->label('Vendedor')
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('contenido')
                    ->label('Nota')
                    ->wrap(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Agregar nota')
                    ->icon('heroicon-o-plus-circle')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()
                    ->visible(fn (LeadNote $record) => auth()->user()->isAdmin() || $record->user_id === auth()->id()),
            ])
            ->bulkActions([]);
    }
}
