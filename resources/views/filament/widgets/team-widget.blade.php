<x-filament-widgets::widget>
<style>
.fr-team-header { display:flex; align-items:center; gap:12px; padding:18px 20px 14px; border-bottom:1px solid rgba(255,255,255,.07); }
.fr-team-icon-wrap { width:38px; height:38px; border-radius:10px; background:rgba(245,158,11,.15); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.fr-team-title { font-size:14px; font-weight:700; color:#f1f5f9; }
.fr-team-subtitle { font-size:11px; color:#64748b; margin-top:1px; }
.fr-team-body { padding:18px 20px; }
.fr-members { display:flex; flex-wrap:wrap; gap:10px; }
.fr-member { display:flex; flex-wrap:wrap; align-items:center; gap:10px; padding:12px 14px; border-radius:12px; min-width:200px; flex:1; max-width:280px; position:relative; transition: transform .15s, box-shadow .15s; cursor:default; }
.fr-member:hover { transform:translateY(-2px); }
.fr-member--admin  { background:rgba(245,158,11,.12); border:1px solid rgba(245,158,11,.3); }
.fr-member--admin:hover  { box-shadow:0 6px 20px rgba(245,158,11,.15); }
.fr-member--vendor { background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.1); }
.fr-member--vendor:hover { box-shadow:0 6px 20px rgba(0,0,0,.3); }
.fr-avatar { width:38px; height:38px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:15px; font-weight:800; color:#fff; flex-shrink:0; position:relative; }
.fr-avatar--admin  { background:linear-gradient(135deg,#f59e0b,#d97706); }
.fr-avatar--vendor { background:linear-gradient(135deg,#475569,#334155); }
.fr-member-name  { font-size:13px; font-weight:600; color:#f1f5f9; }
.fr-member-email { font-size:11px; color:#f59e0b; margin-top:2px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:160px; }
.fr-member-sales { font-size:11px; color:#34d399; font-weight:600; }
.fr-trophy { position:absolute; top:-5px; right:-4px; }
.fr-del-btn { margin-left:auto; flex-shrink:0; width:28px; height:28px; border-radius:8px; display:flex; align-items:center; justify-content:center; background:transparent; border:none; cursor:pointer; color:#64748b; opacity:0; transition:opacity .15s, background .15s, color .15s; }
.fr-member:hover .fr-del-btn { opacity:1; }
.fr-del-btn:hover { background:rgba(239,68,68,.15); color:#ef4444; }
.fr-edit-btn { flex-shrink:0; width:28px; height:28px; border-radius:8px; display:flex; align-items:center; justify-content:center; background:transparent; border:none; cursor:pointer; color:#64748b; opacity:0; transition:opacity .15s, background .15s, color .15s; }
.fr-member:hover .fr-edit-btn { opacity:1; }
.fr-edit-btn:hover { background:rgba(245,158,11,.15); color:#f59e0b; }
.fr-edit-panel { flex-basis:100%; margin-top:10px; padding-top:10px; border-top:1px dashed rgba(255,255,255,.12); display:grid; grid-template-columns:1fr; gap:8px; }
.fr-divider { margin-top:16px; padding-top:14px; border-top:1px solid rgba(255,255,255,.07); }
.fr-toggle-btn { display:inline-flex; align-items:center; gap:6px; padding:9px 18px; font-size:13px; font-weight:600; border-radius:10px; border:none; cursor:pointer; background:linear-gradient(135deg,#f59e0b,#d97706); color:#fff; transition:opacity .15s, transform .1s; }
.fr-toggle-btn:hover { opacity:.9; transform:translateY(-1px); }
.fr-form { margin-top:14px; display:grid; grid-template-columns:1fr 1fr; gap:10px; }
.fr-field { display:flex; flex-direction:column; gap:4px; }
.fr-field label { font-size:11px; font-weight:600; color:#94a3b8; text-transform:uppercase; letter-spacing:.05em; }
.fr-input { padding:9px 12px; font-size:13px; border-radius:9px; border:1px solid rgba(255,255,255,.12); background:rgba(255,255,255,.05); color:#f1f5f9; outline:none; width:100%; transition:border-color .15s, box-shadow .15s; }
.fr-input::placeholder { color:#475569; }
.fr-input:focus { border-color:rgba(245,158,11,.5); box-shadow:0 0 0 3px rgba(245,158,11,.1); }
.fr-select { appearance:none; padding:9px 12px; font-size:13px; border-radius:9px; border:1px solid rgba(255,255,255,.12); background:rgba(30,30,40,.95); color:#f1f5f9; outline:none; width:100%; transition:border-color .15s, box-shadow .15s; cursor:pointer; }
.fr-select:focus { border-color:rgba(245,158,11,.5); box-shadow:0 0 0 3px rgba(245,158,11,.1); }
.fr-full { grid-column:1 / -1; }
.fr-form-actions { grid-column:1 / -1; display:flex; gap:8px; justify-content:flex-end; margin-top:4px; }
.fr-save-btn { padding:9px 20px; font-size:13px; font-weight:600; border-radius:9px; border:none; cursor:pointer; background:linear-gradient(135deg,#f59e0b,#d97706); color:#fff; transition:opacity .15s; }
.fr-save-btn:hover { opacity:.9; }
.fr-cancel-btn { padding:9px 16px; font-size:13px; font-weight:500; border-radius:9px; border:1px solid rgba(255,255,255,.1); background:transparent; color:#94a3b8; cursor:pointer; transition:background .15s; }
.fr-cancel-btn:hover { background:rgba(255,255,255,.05); }
.fr-error { font-size:11px; color:#f87171; margin-top:2px; }
</style>

<div class="fr-team-header">
    <div class="fr-team-icon-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f59e0b" style="width:20px;height:20px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
        </svg>
    </div>
    <div>
        <div class="fr-team-title">Equipo de Ventas</div>
        <div class="fr-team-subtitle">Gestion de vendedores del sistema</div>
    </div>
</div>

<div class="fr-team-body">
    <div class="fr-members">
        @php $maxVentas = $users->max('ventas'); @endphp
        @foreach($users as $user)
            @php
                $initial  = strtoupper(mb_substr($user->name, 0, 1));
                $isAdmin  = $user->isAdmin();
                $isMe     = auth()->id() === $user->id;
                $isLeader = $user->ventas > 0 && $user->ventas === $maxVentas;
                $tasa     = $user->total_leads > 0 ? round(($user->ventas / $user->total_leads) * 100, 0) : 0;
            @endphp
            <div class="fr-member {{ $isAdmin ? 'fr-member--admin' : 'fr-member--vendor' }}">
                <div class="fr-avatar {{ $isAdmin ? 'fr-avatar--admin' : 'fr-avatar--vendor' }}">
                    {{ $initial }}
                    @if($isLeader)
                        <div class="fr-trophy">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="{{ $isAdmin ? '#f59e0b' : '#facc15' }}" style="width:14px;height:14px;filter:drop-shadow(0 1px 2px rgba(0,0,0,.5));">
                                <path fill-rule="evenodd" d="M10 1c-1.828 0-3.623.149-5.371.435a.75.75 0 00-.629.74v.387c-.827.157-1.642.345-2.445.564a.75.75 0 00-.552.698 5 5 0 004.503 5.152 6 6 0 002.946 1.822A6.451 6.451 0 017.768 13H7.5A1.5 1.5 0 006 14.5V17h-.75a.75.75 0 000 1.5h9a.75.75 0 000-1.5H13.5v-2.5A1.5 1.5 0 0012 13h-.268a6.453 6.453 0 01-.684-2.202 6 6 0 002.946-1.822 5 5 0 004.503-5.152.75.75 0 00-.552-.698A31.804 31.804 0 0015.62 2.56v-.387a.75.75 0 00-.629-.74A33.227 33.227 0 0010 1zM2.525 4.422C3.012 4.3 3.504 4.19 4 4.09V5c0 .74.134 1.448.38 2.103a3.503 3.503 0 01-1.855-2.68zm14.95 0a3.503 3.503 0 01-1.854 2.68C15.866 6.449 16 5.74 16 5v-.91c.496.099.988.21 1.475.332z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div style="flex:1;min-width:0;">
                    <div class="fr-member-name">
                        {{ $user->name }}
                        @if($isMe)<span style="font-size:10px;color:#64748b;font-weight:400;"> (vos)</span>@endif
                    </div>
                    @if($isAdmin)
                        <div class="fr-member-email">{{ $user->email }}</div>
                    @else
                        <div style="display:flex;align-items:center;gap:6px;margin-top:2px;">
                            <span style="font-size:10px;color:#64748b;">Vendedor</span>
                            <span class="fr-member-sales">{{ $user->ventas }} venta{{ $user->ventas !== 1 ? 's' : '' }}</span>
                            @if($user->total_leads > 0)
                                <span style="font-size:10px;color:#475569;">({{ $tasa }}%)</span>
                            @endif
                        </div>
                    @endif
                </div>
                @if(auth()->user()->isAdmin())
                    <button class="fr-edit-btn" wire:click="editVendedor({{ $user->id }})" type="button" title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:15px;height:15px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125"/>
                        </svg>
                    </button>
                @endif
                @if(auth()->user()->isAdmin() && !$isAdmin && !$isMe)
                    <button class="fr-del-btn" wire:click="deleteVendedor({{ $user->id }})" wire:confirm="Eliminar a {{ $user->name }}?">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:15px;height:15px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                    </button>
                @endif

                @if(auth()->user()->isAdmin() && $editingUserId === $user->id)
                    <div class="fr-edit-panel">
                        <div class="fr-field">
                            <label>Nombre</label>
                            <input wire:model="editName" type="text" class="fr-input" />
                            @error('editName')<div class="fr-error">{{ $message }}</div>@enderror
                        </div>
                        <div class="fr-field">
                            <label>Email / Usuario</label>
                            <input wire:model="editEmail" type="email" class="fr-input" />
                            @error('editEmail')<div class="fr-error">{{ $message }}</div>@enderror
                        </div>
                        <div class="fr-field">
                            <label>Nueva contrasena (opcional)</label>
                            <input wire:model="editPassword" type="password" placeholder="Dejar en blanco para no cambiarla" class="fr-input" />
                            @error('editPassword')<div class="fr-error">{{ $message }}</div>@enderror
                        </div>
                        @if(!$isMe)
                            <div class="fr-field">
                                <label>Rol</label>
                                <select wire:model="editRole" class="fr-select" style="background-color:rgba(255,255,255,.05);">
                                    <option value="vendedor" style="background:#1e1e28;color:#f1f5f9;">Vendedor</option>
                                    <option value="admin"    style="background:#1e1e28;color:#f1f5f9;">Administrador</option>
                                </select>
                                @error('editRole')<div class="fr-error">{{ $message }}</div>@enderror
                            </div>
                        @endif
                        <div class="fr-form-actions">
                            <button wire:click="cancelEdit" class="fr-cancel-btn" type="button">Cancelar</button>
                            <button wire:click="saveEdit" wire:loading.attr="disabled" class="fr-save-btn" type="button">
                                <span wire:loading.remove wire:target="saveEdit">Guardar cambios</span>
                                <span wire:loading wire:target="saveEdit">Guardando...</span>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @if(auth()->user()->isAdmin())
        <div class="fr-divider">
            @if(!$showForm)
                <button wire:click="$set('showForm', true)" class="fr-toggle-btn" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:14px;height:14px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Agregar usuario
                </button>
            @else
                <div class="fr-form">
                    <div class="fr-field">
                        <label>Nombre *</label>
                        <input wire:model="newName" type="text" placeholder="Ej: Flavio" class="fr-input" />
                        @error('newName')<div class="fr-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="fr-field">
                        <label>Apellido</label>
                        <input wire:model="newLastName" type="text" placeholder="Ej: Dacierno" class="fr-input" />
                        @error('newLastName')<div class="fr-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="fr-field">
                        <label>Email / Usuario *</label>
                        <input wire:model="newEmail" type="email" placeholder="usuario@ejemplo.com" class="fr-input" />
                        @error('newEmail')<div class="fr-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="fr-field">
                        <label>Contrasena *</label>
                        <input wire:model="newPassword" type="password" placeholder="Min. 6 caracteres" class="fr-input" />
                        @error('newPassword')<div class="fr-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="fr-field">
                        <label>Rol</label>
                        <select wire:model="newRole" style="appearance:none;-webkit-appearance:none;background-image:none;padding:9px 12px;font-size:13px;border-radius:9px;border:1px solid rgba(255,255,255,.12);background-color:rgba(255,255,255,.05);color:#f1f5f9;outline:none;width:100%;cursor:pointer;">
                            <option value="vendedor" style="background:#1e1e28;color:#f1f5f9;">Vendedor</option>
                            <option value="admin"    style="background:#1e1e28;color:#f1f5f9;">Administrador</option>
                        </select>
                        @error('newRole')<div class="fr-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="fr-form-actions">
                        <button wire:click="$set('showForm', false)" class="fr-cancel-btn" type="button">Cancelar</button>
                        <button wire:click="addVendedor" wire:loading.attr="disabled" class="fr-save-btn" type="button">
                            <span wire:loading.remove wire:target="addVendedor">Crear usuario</span>
                            <span wire:loading wire:target="addVendedor">Guardando...</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
</x-filament-widgets::widget>
