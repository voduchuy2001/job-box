<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalAddress extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    #[Rule('required|string|max:255')]
    public string $houseNumber = '';

    #[Rule('required|integer')]
    public string|null $provinceId;

    public mixed $districts = [];

    #[Rule('required|integer')]
    public string|null $districtId;

    public mixed $wards = [];

    #[Rule('required')]
    public string|null $wardId;

    public function saveAddress(): void
    {
        $validated = $this->validate();

        $this->user->addresses()->updateOrCreate([
            'name' => $validated['houseNumber'],
            'province_id' => $validated['provinceId'],
            'district_id' => $validated['districtId'],
            'ward_id' => $validated['wardId'],
        ]);

        $this->alert('success', __('Create success!'));
        $this->reset([
            'houseNumber',
            'provinceId',
            'provinces',
            'districtId',
            'districts',
            'wardId',
            'wards'
        ]);

        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        $provinces = Province::all();

        if (! empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }

        if (! empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.admin.user.modules.personal-address', [
            'provinces' => $provinces,
        ]);
    }
}
