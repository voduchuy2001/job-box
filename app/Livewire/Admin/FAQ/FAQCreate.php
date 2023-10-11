<?php

namespace App\Livewire\Admin\FAQ;

use App\Helpers\BaseHelper;
use App\Models\FAQ;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FAQCreate extends Component
{
    use LivewireAlert;

    #[Rule('required|string|min:10|max:255')]
    public string $question;

    #[Rule('required|string')]
    public string $answer;

    public function saveFAQ(): void
    {
        $validatedData = $this->validate();

        FAQ::create([
            'question' => $validatedData['question'],
            'answer' => $validatedData['answer'],
        ]);

        $this->alert('success', trans('Create success'));
        $this->redirect(FAQList::class, navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Create FAQ'), trans('FAQs'));

        return view('livewire.admin.faq.faq-create');
    }
}
