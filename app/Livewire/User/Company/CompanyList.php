<?php

namespace App\Livewire\User\Company;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Title('Danh Sách Các Công Ty')]
class CompanyList extends Component
{
    use WithPagination;

    public int $itemPerPage = 12;

    #[Layout('layouts.user')]
    public function render(): View
    {
        $role = Role::where('name', 'company')->first();
        $companies = $role->users()
            ->has('profile')
            ->with('profile', 'avatar')
            ->withCount('jobs')
            ->paginate($this->itemPerPage);

        return view('livewire.user.company.company-list', [
            'companies' => $companies,
        ]);
    }
}
