<?php

namespace App\Traits;

use App\Models\TrendingWord;

trait WordTrend
{
    public function createTrendingWords(string $searchTerm): void
    {
        $filePath = __DIR__ . '/../../public/storage/files/blacklist.json';

        $blacklistKeywords = json_decode(file_get_contents($filePath), true) ?? [];

        if (! empty($searchTerm && ! in_array($searchTerm, $blacklistKeywords))) {
            $keywords = explode(" ", $searchTerm);
            $existingKeywords = TrendingWord::whereIn('name', $keywords)->get();

            $existingKeywordsMap = $existingKeywords->pluck('name')->toArray();

            foreach ($keywords as $keyword) {
                if (! in_array($keyword, $existingKeywordsMap)) {
                    TrendingWord::create([
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
