<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class TeamWidget extends Widget
{
    protected static string $view = 'filament.widgets.team-widget';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected static bool $isLazy = false;

    public string $newName     = '';
    public string $newLastName = '';
    public string $newEmail    = '';
    public string $newPassword = '';
    public string $newRole     = 'vendedor';
    public bool   $showForm    = false;

    public ?int $editingUserId = null;
    public string $editName     = '';
    public string $editEmail    = '';
    public string $editPassword = '';
    public string $editRole     = 'vendedor';

    public function addVendedor(): void
    {
        $this->validate([
            'newName'     => 'required|string|min:2|max:100',
            'newLastName' => 'nullable|string|max:100',
            'newEmail'    => 'required|email|unique:users,email',
            'newPassword' => 'required|string|min:6|max:255',
            'newRole'     => 'required|in:admin,vendedor',
        ]);

        User::create([
            'name'     => trim($this->newName . ' ' . $this->newLastName),
            'email'    => $this->newEmail,
            'password' => bcrypt($this->newPassword),
            'role'     => $this->newRole,
        ]);

        $this->reset(['newName', 'newLastName', 'newEmail', 'newPassword', 'showForm']);
        $this->newRole = 'vendedor';

        Notification::make()->title('Usuario creado correctamente')->success()->send();
    }

    public function editVendedor(int $id): void
    {
        if (!auth()->user()->isAdmin()) {
            Notification::make()->title('Sin permisos')->danger()->send();
            return;
        }

        $user = User::findOrFail($id);

        $this->editingUserId = $user->id;
        $this->editName       = $user->name;
        $this->editEmail      = $user->email;
        $this->editPassword   = '';
        $this->editRole       = $user->role;
        $this->showForm       = false;
    }

    public function cancelEdit(): void
    {
        $this->reset(['editingUserId', 'editName', 'editEmail', 'editPassword', 'editRole']);
        $this->editRole = 'vendedor';
    }

    public function saveEdit(): void
    {
        if (!auth()->user()->isAdmin() || !$this->editingUserId) {
            Notification::make()->title('Sin permisos')->danger()->send();
            return;
        }

        $user = User::findOrFail($this->editingUserId);

        $this->validate([
            'editName'     => 'required|string|min:2|max:100',
            'editEmail'    => 'required|email|unique:users,email,' . $user->id,
            'editPassword' => 'nullable|string|min:6|max:255',
            'editRole'     => 'required|in:admin,vendedor',
        ]);

        $data = [
            'name'  => $this->editName,
            'email' => $this->editEmail,
            'role'  => $this->editRole,
        ];

        if (filled($this->editPassword)) {
            $data['password'] = bcrypt($this->editPassword);
        }

        $user->update($data);

        $this->cancelEdit();

        Notification::make()->title('Usuario actualizado correctamente')->success()->send();
    }

    public function deleteVendedor(int $id): void
    {
        if (!auth()->user()->isAdmin()) {
            Notification::make()->title('Sin permisos')->danger()->send();
            return;
        }

        $user = User::findOrFail($id);

        if ($user->isAdmin()) {
            Notification::make()->title('No podés eliminar un administrador')->danger()->send();
            return;
        }

        $user->delete();
        Notification::make()->title('Vendedor eliminado')->success()->send();
    }

    protected function getViewData(): array
    {
        $users = User::withCount([
            'leads as total_leads',
            'leads as ventas' => fn ($q) => $q->where('status', 'VENDIDO'),
        ])
        ->orderByDesc('ventas')
        ->orderBy('name')
        ->get();

        return ['users' => $users];
    }
}
