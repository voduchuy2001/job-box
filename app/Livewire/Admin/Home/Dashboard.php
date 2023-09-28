<?php

namespace App\Livewire\Admin\Home;

use App\Helpers\BaseHelper;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    use LivewireAlert;

    public function getListeners(): array
    {
        return [
            "echo:company-job-create,CompanyJobCreate" => 'showNotification',
            "echo:company-job-edit,CompanyJobEdit" => 'showNotification',
        ];
    }

    public function showNotification(mixed $event): void
    {
        $this->alert('success', $event['message']);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(__('Dashboard'));
        return view('livewire.admin.home.dashboard');
    }
}
