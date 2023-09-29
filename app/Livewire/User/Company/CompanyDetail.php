<?php

namespace App\Livewire\User\Company;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Chi Tiết Công Ty')]
class CompanyDetail extends Component
{
    public mixed $company;

    public function mount(string|int $id): void
    {
        $role = Role::where('name', 'company')->first();
        $this->company = $role->users()
            ->has('companyProfile')
            ->with('companyProfile', 'avatar')
            ->withCount('jobs')
            ->withSum('jobs', 'vacancy')
            ->findOrFail($id);
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.company.company-detail');
    }
}
