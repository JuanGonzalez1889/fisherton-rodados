<?php

namespace App\Filament\Resources\LeadResource\Pages;

use App\Filament\Resources\LeadResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLead extends CreateRecord
{
    protected static string $resource = LeadResource::class;

    protected static ?string $title = 'Nuevo Cliente';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['user_id'])) {
            $data['user_id'] = auth()->id();
        }
        if (empty($data['ultima_hora_contacto'])) {
            $data['ultima_hora_contacto'] = now();
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
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

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label('Guardar cliente'),
            $this->getCreateAnotherFormAction()->label('Guardar y crear otro'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
