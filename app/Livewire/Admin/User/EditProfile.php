<?php

namespace App\Livewire\Admin\User;

use App\Models\Address;
use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit User Profile')]
class EditProfile extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public User $user;

    public mixed $confirm = null;

    public int $limit = 3;

    public function mount(int|string $id): void
    {
        $user = User::getUserById($id);
        $this->user = $user;
    }

    public function loadMore(): void
    {
        $this->limit += 3;
        $this->dispatch('refresh');
    }

    public function confirmDelete(int|string $id): void
    {
        $this->confirm = $this->confirm === $id ? null : $id;
    }

    public function delete(string|int $id): void
    {
        $address = Address::getAddressById($id);
        $address->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $address->name]));
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        $addresses = $this->user->addresses()->orderByDesc('created_at')->limit($this->limit)->get();

        $userAddresses = $this->user->addresses()->count();

        return view('livewire.admin.user.edit-profile', [
            'addresses' => $addresses,
            'userAddresses' => $userAddresses,
        ]);
    }
}
