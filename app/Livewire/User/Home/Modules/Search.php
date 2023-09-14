<?php

namespace App\Livewire\User\Home\Modules;

use App\Models\Job;
use App\Models\Keyword;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Search extends Component
{
    public string $searchTerm;

    public mixed $jobs;

    public bool $showSuggestions;

    public function hideSuggestions(): void
    {
        $this->showSuggestions = false;
    }

    public function search(): void
    {
        if (! empty($this->searchTerm)) {
            $this->jobs = Job::getLimitJobs($this->searchTerm);

            $keywords = explode(" ", $this->searchTerm);
            $existingKeywords = Keyword::whereIn('name', $keywords)->get();

            $existingKeywordsMap = $existingKeywords->pluck('name')->toArray();

            foreach ($keywords as $keyword) {
                if (! in_array($keyword, $existingKeywordsMap)) {
                    Keyword::create([
                        'name' => $keyword,
                        'count' => 1
                    ]);
                }

                $existingKeyword = $existingKeywords->where('name', $keyword)->first();

                if ($existingKeyword) {
                    $existingKeyword->increment('count');
                }
            }

            $this->dispatch('refresh');
            return;
        }

        $this->jobs = [];
        $this->dispatch('refresh');
    }

    public function updatedSearchTerm(): void
    {
        $this->showSuggestions = true;
        $this->search();
    }


    #[On('refresh')]
    public function render(): View
    {
        return view('livewire.user.home.modules.search');
    }
}
