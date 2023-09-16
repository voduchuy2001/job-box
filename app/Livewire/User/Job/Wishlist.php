<?php

namespace App\Livewire\User\Job;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Wishlist extends Component
{
    use LivewireAlert;

    public mixed $jobId;

    public mixed $wishlist = [];

    public User $user;

    #[On('refresh')]
    public function mount(): void
    {

        if (! Auth::user()) {
            $this->redirectRoute('login');
            toast(trans('You must login before save job'), 'warning');
            return;
        }

        $this->user = $user = User::where('id', Auth::id())
            ->with('wishlists')
            ->first();
        $this->wishlist = $user->wishlists->pluck('id')->toArray();
    }

    public function addOrRemoveToWishList(): void
    {
        $wishlistJobIds = $this->wishlist;

        if (in_array($this->jobId, $wishlistJobIds)) {
            $this->user->wishlists()->detach($this->jobId);
            $this->alert('success', trans('Delete success'));
            $this->dispatch('refresh');
            return;
        }

        $this->user->wishlists()->attach($this->jobId);
        $this->alert('success', trans('Save success'));
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.job.wishlist');
    }
}
