<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class SalesRankingWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = true;

    protected static ?string $heading = 'Ranking de Vendedores';

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

    protected function scopePeriod(Builder $query): Builder
    {
        if ($this->period === 'mensual') {
            $query->whereMonth('updated_at', $this->month)
                  ->whereYear('updated_at', $this->year);
        }

        return $query;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()
                    ->withCount([
                        'leads as total_leads',
                        'leads as c_nuevo'      => fn (Builder $q) => $this->scopePeriod($q->where('status', 'NUEVO')),
                        'leads as c_contactar'  => fn (Builder $q) => $this->scopePeriod($q->where('status', 'CONTACTAR')),
                        'leads as c_contactado' => fn (Builder $q) => $this->scopePeriod($q->where('status', 'CONTACTADO')),
                        'leads as c_interesado' => fn (Builder $q) => $this->scopePeriod($q->where('status', 'INTERESADO')),
                        'leads as ventas'       => fn (Builder $q) => $this->scopePeriod($q->where('status', 'VENDIDO')),
                        'leads as c_no_avanza'  => fn (Builder $q) => $this->scopePeriod($q->where('status', 'NO AVANZA')),
                    ])
                    ->orderByDesc('ventas')
                    ->orderByDesc('c_interesado')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Vendedor')
                    ->icon('heroicon-o-user')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('total_leads')
                    ->label('Total')
                    ->badge()
                    ->color('gray')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('c_nuevo')
                    ->label('Nuevos')
                    ->badge()
                    ->color('info')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('c_contactar')
                    ->label('A contactar')
                    ->badge()
                    ->color('primary')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('c_contactado')
                    ->label('Contactados')
                    ->badge()
                    ->color('warning')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('c_interesado')
                    ->label('Interesados')
                    ->badge()
                    ->color('primary')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('ventas')
                    ->label('Vendidos')
                    ->badge()
                    ->color('success')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('c_no_avanza')
                    ->label('No avanza')
                    ->badge()
                    ->color('danger')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('tasa_cierre')
                    ->label('Tasa cierre')
                    ->getStateUsing(fn ($record): string =>
                        $record->total_leads > 0
                            ? round(($record->ventas / $record->total_leads) * 100, 1) . '%'
                            : '0%'
                    )
                    ->badge()
                    ->color(fn (string $state): string =>
                        (float) rtrim($state, '%') >= 30 ? 'success' : 'warning'
                    )
                    ->alignCenter(),
            ])
            ->paginated(false);
    }
}
