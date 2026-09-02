<?php

namespace App\Filament\Resources\LeadResource\Pages;

use App\Filament\Resources\LeadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLead extends EditRecord
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->visible(fn (): bool => auth()->user()->isAdmin()),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()->label('Guardar cambios'),
            $this->getCancelFormAction()->label('Volver al listado')->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Quedarse en la edición para poder ver el historial de notas
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }

    protected function afterSave(): void
    {
        $message = trim($this->record->message ?? '');
        if (!empty($message)) {
            $this->record->notas()->create([
                'user_id'   => auth()->id(),
                'contenido' => $message,
            ]);
            $this->record->update(['message' => null]);
        }
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!auth()->user()->isAdmin() && empty($data['user_id'])) {
            $data['user_id'] = $this->record->user_id;
        }
        return $data;
    }
}
