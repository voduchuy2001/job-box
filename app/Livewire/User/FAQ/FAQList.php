<?php

namespace App\Livewire\User\FAQ;

use App\Models\FAQ;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class FAQList extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        $faqs = FAQ::orderByDesc('created_at')->get();
        $numCols = 3;
        $chunkSize = round($faqs->count() / $numCols);
        $faqsChunks = $faqs->chunk($chunkSize);

        return view('livewire.user.faq.faq-list', [
            'faqsChunks' => $faqsChunks,
        ]);
    }
}
