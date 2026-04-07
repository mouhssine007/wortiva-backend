<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DeeplService
{
    private string $apiKey;
    private string $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.deepl.key');
        $this->apiUrl = 'https://api-free.deepl.com/v2/translate';
    }

    public function translate(string $text, string $targetLang = 'EN'): string
    {
        $response = Http::withHeaders([
            'Authorization' => 'DeepL-Auth-Key ' . $this->apiKey,
        ])->post($this->apiUrl, [
            'text' => [$text],
            'target_lang' => $targetLang,
            'source_lang' => 'DE',
        ]);

        if ($response->successful()) {
            return $response->json('translations.0.text') ?? $text;
        }

        return $text;
    }
}