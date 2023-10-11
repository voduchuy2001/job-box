<?php

namespace App\Livewire\Admin\Setting\Modules;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SiteInformationComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    #[Rule('string|max:255')]
    public string $siteName;

    #[Rule('string|max:255')]
    public string $siteDescription;

    #[Rule('string|max:255')]
    public string $siteSlogan;

    #[Rule('email|max:255')]
    public string $email;

    #[Rule('string|max:255')]
    public string $youtube;

    #[Rule('string|max:255')]
    public string $facebook;

    #[Rule('numeric')]
    public string $phoneNumber;

    public function mount(): void
    {
        $repositories = new SettingRepository();
        $settings = $repositories->getAllSettings();
        $this->siteName = $settings['siteName'];
        $this->siteDescription = $settings['siteDescription'];
        $this->siteSlogan = $settings['siteSlogan'];
        $this->email = $settings['email'];
        $this->youtube = $settings['youtube'];
        $this->facebook = $settings['facebook'];
        $this->phoneNumber = $settings['phoneNumber'];
    }

    public function saveSettings(): void
    {
        $validatedData = $this->validate();

        foreach ($validatedData as $name => $value) {
            Setting::updateOrCreate([
                'name' => $name
            ], [
                'payload' => $value
            ]);
        }

        Artisan::call('cache:clear');
        $this->alert('success', trans('Update success'));
    }

    public function render(): View
    {
        return view('livewire.admin.setting.modules.site-information-component');
    }
}
