<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class MonthSelectorWidget extends Widget
{
    protected static string $view = 'filament.widgets.month-selector';

    protected static ?int $sort = 0;

    protected int | string | array $columnSpan = 'full';

    public int $month;
    public int $year;
    public string $period = 'mensual';

    public array $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre',
    ];

    public function mount(): void
    {
        $this->month = now()->month;
        $this->year  = now()->year;
    }

    public function updatedMonth(): void
    {
        $this->notifyMonthChanged();
    }

    public function updatedYear(): void
    {
        $this->notifyMonthChanged();
    }

    public function updatedPeriod(): void
    {
        $this->notifyMonthChanged();
    }

    protected function notifyMonthChanged(): void
    {
        $this->dispatch('monthChanged', month: $this->month, year: $this->year, period: $this->period);
    }
}
