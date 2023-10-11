<?php

namespace App\Livewire\Admin\FAQ;

use App\Helpers\BaseHelper;
use App\Models\FAQ;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class FAQEdit extends Component
{
    use LivewireAlert;

    #[Rule('required|string|min:10|max:255')]
    public string $question;

    #[Rule('required|string')]
    public string $answer;

    public mixed $faq;

    public function mount(string $id): void
    {
        $this->faq = $faq = FAQ::findOrFail($id);
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function updateFAQ(): void
    {
        $validatedData = $this->validate();

        $this->faq->update([
            'question' => $validatedData['question'],
            'answer' => $validatedData['answer'],
        ]);

        $this->alert('success', trans('Update success'));
        $this->redirect(FAQList::class, navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Edit FAQ'), trans('FAQs'));

        return view('livewire.admin.faq.faq-edit');
    }
}
