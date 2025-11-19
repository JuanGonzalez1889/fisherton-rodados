<?php


namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVehicle extends CreateRecord
{
    protected static string $resource = VehicleResource::class;

    protected static ?string $title = 'Crear Vehículo';

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Crear'),
            $this->getCreateAnotherFormAction()
                ->label('Crear y crear otro'),
            $this->getCancelFormAction()
                ->label('Cancelar'),
        ];
    }
}