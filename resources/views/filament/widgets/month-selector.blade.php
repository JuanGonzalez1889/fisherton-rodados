<x-filament-widgets::widget>
    <style>
    .fr-month-select {
        background: #1e293b;
        border: 1px solid rgba(148,163,184,.25);
        padding: 6px 10px;
        border-radius: 8px;
        color: #e2e8f0;
    }
    .fr-month-select option {
        background: #1e293b;
        color: #e2e8f0;
    }
    </style>
    <div style="display:flex;gap:10px;align-items:center;margin-bottom:12px;flex-wrap:wrap;">
        <label style="color:#cbd5e1;font-weight:700;">Periodo:</label>
        <select wire:model.live="period" class="fr-month-select">
            <option value="mensual">Mensual</option>
            <option value="historico">Histórico</option>
        </select>

        @if($period === 'mensual')
            <label style="color:#cbd5e1;font-weight:700;">Mes:</label>
            <select wire:model.live="month" class="fr-month-select">
                @foreach($meses as $num => $nombre)
                    <option value="{{ $num }}">{{ $nombre }}</option>
                @endforeach
            </select>

            <label style="color:#cbd5e1;font-weight:700;">Año:</label>
            <select wire:model.live="year" class="fr-month-select">
                @php
                    $current = now()->year;
                    $start = $current - 2;
                    $end = $current + 1;
                @endphp
                @for($y = $start; $y <= $end; $y++)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select>
        @endif
    </div>
</x-filament-widgets::widget>
