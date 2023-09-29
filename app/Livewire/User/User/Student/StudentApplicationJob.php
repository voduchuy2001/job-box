<?php

namespace App\Livewire\User\User\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Danh Sách Các Việc Đã Ứng Tuyển')]
class StudentApplicationJob extends Component
{
    public function mount(): void
    {
        if (! Auth::user()->hasRole('Student')) {
            abort(403);
        }
    }
    public function render(): View
    {
        return view('livewire.user.user.student.student-application-job');
    }
}
