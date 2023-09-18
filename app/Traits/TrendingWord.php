<?php

namespace App\Traits;

use App\Models\Keyword;

trait TrendingWord
{
    public function createTrendingWords(string $searchTerm): void
    {
        $filePath = storage_path('app/public/files/blacklist.json');
        if (!file_exists($filePath)) {
            $filePath = storage_path('app/blacklist.json');
        }

        $blacklistKeywords = json_decode(file_get_contents($filePath), true) ?? [];

        if (! empty($searchTerm && ! in_array($searchTerm, $blacklistKeywords))) {
            $keywords = explode(" ", $searchTerm);
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
        }
    }
}
