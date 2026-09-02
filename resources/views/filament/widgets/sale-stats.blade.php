<x-filament-widgets::widget>
<style>
.fr-grid-8 {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
}
@@media (max-width: 1280px) { .fr-grid-8 { grid-template-columns: repeat(4, minmax(0, 1fr)); } }
@@media (max-width: 900px)  { .fr-grid-8 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
@@media (max-width: 520px)  { .fr-grid-8 { grid-template-columns: 1fr; } }
.fr-s {
    position: relative; border-radius: 14px; padding: 16px 18px;
    display: flex; align-items: flex-start; justify-content: space-between; gap: 10px;
    overflow: hidden; transition: transform .18s ease, box-shadow .18s ease; cursor: default;
}
.fr-s:hover { transform: translateY(-3px); }
.fr-s-blue   { background:linear-gradient(135deg,rgba(59,130,246,.18),rgba(59,130,246,.05)); border:1px solid rgba(59,130,246,.35); }
.fr-s-blue:hover   { box-shadow:0 8px 24px rgba(59,130,246,.25); }
.fr-s-sky    { background:linear-gradient(135deg,rgba(14,165,233,.18),rgba(14,165,233,.05)); border:1px solid rgba(14,165,233,.35); }
.fr-s-sky:hover    { box-shadow:0 8px 24px rgba(14,165,233,.25); }
.fr-s-indigo { background:linear-gradient(135deg,rgba(99,102,241,.18),rgba(99,102,241,.05)); border:1px solid rgba(99,102,241,.35); }
.fr-s-indigo:hover { box-shadow:0 8px 24px rgba(99,102,241,.25); }
.fr-s-amber  { background:linear-gradient(135deg,rgba(245,158,11,.18),rgba(245,158,11,.05)); border:1px solid rgba(245,158,11,.35); }
.fr-s-amber:hover  { box-shadow:0 8px 24px rgba(245,158,11,.25); }
.fr-s-violet { background:linear-gradient(135deg,rgba(139,92,246,.18),rgba(139,92,246,.05)); border:1px solid rgba(139,92,246,.35); }
.fr-s-violet:hover { box-shadow:0 8px 24px rgba(139,92,246,.25); }
.fr-s-green  { background:linear-gradient(135deg,rgba(16,185,129,.18),rgba(16,185,129,.05)); border:1px solid rgba(16,185,129,.35); }
.fr-s-green:hover  { box-shadow:0 8px 24px rgba(16,185,129,.25); }
.fr-s-red    { background:linear-gradient(135deg,rgba(239,68,68,.18),rgba(239,68,68,.05)); border:1px solid rgba(239,68,68,.35); }
.fr-s-red:hover    { box-shadow:0 8px 24px rgba(239,68,68,.25); }
.fr-s-teal   { background:linear-gradient(135deg,rgba(20,184,166,.18),rgba(20,184,166,.05)); border:1px solid rgba(20,184,166,.35); }
.fr-s-teal:hover   { box-shadow:0 8px 24px rgba(20,184,166,.25); }
.fr-s-top { position:absolute; top:0; left:0; right:0; height:3px; border-radius:14px 14px 0 0; }
.fr-s-label { font-size:9px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:#94a3b8; margin-bottom:4px; }
.fr-s-value { font-size:36px; font-weight:800; line-height:1; color:#f1f5f9; }
.fr-s-desc  { margin-top:6px; font-size:11px; color:#64748b; display:flex; align-items:center; gap:3px; }
.fr-s-sub   { margin-top:4px; font-size:10px; color:#475569; }
.fr-s-icon  { flex-shrink:0; width:42px; height:42px; border-radius:11px; display:flex; align-items:center; justify-content:center; transition:transform .18s ease; }
.fr-s:hover .fr-s-icon { transform:scale(1.12) rotate(-4deg); }
</style>

<div class="fr-grid-8">

    {{-- Total Clientes --}}
    <div class="fr-s fr-s-blue">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#60a5fa,#3b82f6);"></div>
        <div>
            <div class="fr-s-label">Total Clientes</div>
            <div class="fr-s-value">{{ $total }}</div>
            <div class="fr-s-desc">En toda la base</div>
        </div>
        <div class="fr-s-icon" style="background:rgba(59,130,246,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3b82f6" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
        </div>
    </div>

    {{-- Nuevos --}}
    <div class="fr-s fr-s-sky">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#38bdf8,#0ea5e9);"></div>
        <div>
            <div class="fr-s-label">Nuevos</div>
            <div class="fr-s-value" style="color:#38bdf8;">{{ $nuevos }}</div>
            <div class="fr-s-desc">Sin contactar aún</div>
            @if($total > 0)<div class="fr-s-sub">{{ round($nuevos/$total*100) }}% del total</div>@endif
        </div>
        <div class="fr-s-icon" style="background:rgba(14,165,233,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0ea5e9" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
        </div>
    </div>

    {{-- A Contactar --}}
    <div class="fr-s fr-s-indigo">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#818cf8,#6366f1);"></div>
        <div>
            <div class="fr-s-label">A Contactar</div>
            <div class="fr-s-value" style="color:#818cf8;">{{ $contactar }}</div>
            <div class="fr-s-desc">Pendientes de llamada</div>
            @if($total > 0)<div class="fr-s-sub">{{ round($contactar/$total*100) }}% del total</div>@endif
        </div>
        <div class="fr-s-icon" style="background:rgba(99,102,241,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6366f1" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
        </div>
    </div>

    {{-- Contactados --}}
    <div class="fr-s fr-s-amber">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#fbbf24,#f59e0b);"></div>
        <div>
            <div class="fr-s-label">Contactados</div>
            <div class="fr-s-value" style="color:#fbbf24;">{{ $contactados }}</div>
            <div class="fr-s-desc">En seguimiento activo</div>
            @if($total > 0)<div class="fr-s-sub">{{ round($contactados/$total*100) }}% del total</div>@endif
        </div>
        <div class="fr-s-icon" style="background:rgba(245,158,11,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f59e0b" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
        </div>
    </div>

    {{-- Interesados --}}
    <div class="fr-s fr-s-violet">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#a78bfa,#8b5cf6);"></div>
        <div>
            <div class="fr-s-label">Interesados</div>
            <div class="fr-s-value" style="color:#a78bfa;">{{ $interesados }}</div>
            <div class="fr-s-desc">Alta intencion de compra</div>
            @if($total > 0)<div class="fr-s-sub">{{ round($interesados/$total*100) }}% del total</div>@endif
        </div>
        <div class="fr-s-icon" style="background:rgba(139,92,246,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#8b5cf6" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
        </div>
    </div>

    {{-- Vendidos este mes --}}
    <div class="fr-s fr-s-green">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#34d399,#10b981);"></div>
        <div>
            <div class="fr-s-label">{{ $period === 'mensual' ? 'Vendidos este mes' : 'Vendidos (histórico)' }}</div>
            <div class="fr-s-value" style="color:#34d399;">{{ $vendidosMes }}</div>
            <div class="fr-s-desc" style="color:#34d399;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width:12px;height:12px;"><path fill-rule="evenodd" d="M12.577 4.878a.75.75 0 01.919-.53l4.78 1.281a.75.75 0 01.531.919l-1.281 4.78a.75.75 0 01-1.449-.387l.81-3.022a19.407 19.407 0 00-5.594 5.203.75.75 0 01-1.139.093L7 10.06l-4.72 4.72a.75.75 0 01-1.06-1.061l5.25-5.25a.75.75 0 011.06 0l3.074 3.073a20.923 20.923 0 015.545-4.931l-3.042-.815a.75.75 0 01-.53-.918z"/></svg>
                {{ $period === 'mensual' ? 'Cierres del mes' : 'Cierres totales' }}
            </div>
            <div class="fr-s-sub">{{ $vendidos }} totales historicos</div>
        </div>
        <div class="fr-s-icon" style="background:rgba(16,185,129,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#10b981" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/></svg>
        </div>
    </div>

    {{-- Perdido --}}
    <div class="fr-s fr-s-red">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#f87171,#ef4444);"></div>
        <div>
            <div class="fr-s-label">Perdido</div>
            <div class="fr-s-value" style="color:#f87171;">{{ $noAvanza }}</div>
            <div class="fr-s-desc">Descartados</div>
            @if($total > 0)<div class="fr-s-sub">{{ round($noAvanza/$total*100) }}% del total</div>@endif
        </div>
        <div class="fr-s-icon" style="background:rgba(239,68,68,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ef4444" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
        </div>
    </div>

    {{-- Tasa de cierre global --}}
    <div class="fr-s fr-s-teal">
        <div class="fr-s-top" style="background:linear-gradient(90deg,#2dd4bf,#14b8a6);"></div>
        <div>
            <div class="fr-s-label">Tasa de Cierre</div>
            <div class="fr-s-value" style="color:#2dd4bf;">{{ $tasa }}%</div>
            <div class="fr-s-desc">Ventas sobre total</div>
            <div class="fr-s-sub">{{ $vendidos }} vendidos / {{ $total }} leads</div>
        </div>
        <div class="fr-s-icon" style="background:rgba(20,184,166,.18);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#14b8a6" style="width:22px;height:22px;"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
        </div>
    </div>

</div>
</x-filament-widgets::widget>
