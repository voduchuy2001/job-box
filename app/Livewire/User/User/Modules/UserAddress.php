<?php

namespace App\Livewire\User\User\Modules;

use App\Livewire\User\User\UserResume;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserAddress extends Component
{
    use LivewireAlert;

    #[Rule('nullable|string|max:255')]
    public string $houseNumber = '';

    #[Rule('required|integer')]
    public string|null $provinceId;

    public mixed $districts = [];

    #[Rule('required|integer')]
    public string|null $districtId;

    public mixed $wards = [];

    #[Rule('required')]
    public string|null $wardId;

    public function mount(): void
    {
        if (! Auth::check()) {
            $this->redirect(UserResume::class, navigate: true);
        }
    }

    public function saveAddress(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->addresses()->create([
            'name' => $validatedData['houseNumber'],
            'province_id' => $validatedData['provinceId'],
            'district_id' => $validatedData['districtId'],
            'ward_id' => $validatedData['wardId'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        $provinces = Province::all();

        if (! empty($this->provinceId)) {
            $this->districts = $districts =  District::where('province_id', $this->provinceId)->get();
        }

        if (! empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.user.user.modules.user-address', [
            'provinces' => $provinces,
        ]);
    }
}
