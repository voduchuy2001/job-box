<?php

namespace App\Livewire\Admin\Setting\Modules;

use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class LogoComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    #[Rule('nullable|image|max:2048')]
    public mixed $logo = null;

    public mixed $setting;

    #[On('refresh')]
    public function mount(): void
    {
        $this->setting = $setting = Setting::getSettingByName('logo');
        $this->logo = $setting;
    }

    public function updatedLogo(): void
    {
        $validatedData = $this->validate();

        if (! $validatedData['logo']) {
            return;
        }

        if ($this->setting) {
            File::delete($this->setting);
            $logoUrl = $validatedData['logo']->store('upload');
            Setting::updateOrCreate([
                'name' => 'logo',
            ], [
                'payload' => $logoUrl,
            ]);

            Artisan::call('cache:clear');
            $this->alert('success', trans('Update success'));
        }

        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.setting.modules.logo-component');
    }
}
