<?php

namespace App\Livewire\Admin\Partial;

use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ToastComponent extends Component
{
    use LivewireAlert;

    public function getListeners(): array
    {
        return [
            "echo:company-job-create,CompanyJobCreateEvent" => 'showNotification',
            "echo:company-job-edit,CompanyJobEditEvent" => 'showNotification',
        ];
    }

    public function showNotification(mixed $event): void
    {
        $this->alert('success', $event['message']);
    }

    public function render(): View
    {
        return view('livewire.admin.partial.toast-component');
    }
}
