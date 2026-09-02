<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use Filament\Widgets\Widget;

class SaleStatsWidget extends Widget
{
    protected static string $view = 'filament.widgets.sale-stats';

    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    public int $month;
    public int $year;
    public string $period = 'mensual';

    protected $listeners = [
        'monthChanged' => 'handleMonthChanged',
    ];

    public function mount(): void
    {
        $this->month = now()->month;
        $this->year  = now()->year;
    }

    public function handleMonthChanged(int $month, int $year, string $period = 'mensual'): void
    {
        $this->month = $month;
        $this->year = $year;
        $this->period = $period;
    }

    protected function applyPeriod($query)
    {
        if ($this->period === 'mensual') {
            $query->whereMonth('updated_at', $this->month)
                  ->whereYear('updated_at', $this->year);
        }

        return $query;
    }

    protected function getViewData(): array
    {
        $total       = Lead::count();
        $nuevos      = $this->applyPeriod(Lead::where('status', 'NUEVO'))->count();
        $contactar   = $this->applyPeriod(Lead::where('status', 'CONTACTAR'))->count();
        $contactados = $this->applyPeriod(Lead::where('status', 'CONTACTADO'))->count();
        $interesados = $this->applyPeriod(Lead::where('status', 'INTERESADO'))->count();
        $vendidos    = Lead::where('status', 'VENDIDO')->count();
        $vendidosMes = $this->applyPeriod(Lead::where('status', 'VENDIDO'))->count();
        $noAvanza    = $this->applyPeriod(Lead::where('status', 'NO AVANZA'))->count();
        $tasa        = $total > 0 ? round(($vendidos / $total) * 100, 1) : 0;

        return compact(
            'total', 'nuevos', 'contactar', 'contactados',
            'interesados', 'vendidos', 'vendidosMes', 'noAvanza', 'tasa'
        ) + ['period' => $this->period];
    }
}
