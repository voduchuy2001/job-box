<?php

namespace App\Livewire\User\User\Company;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang Cá Nhân')]
class CompanyProfile extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.user.company.company-profile');
    }
}
