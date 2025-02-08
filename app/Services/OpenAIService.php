<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getGameRecommendations(string $description)
    {
        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'Based on the description provided, suggest a list of 1 to 5 game names. Return only the names of individual games, separated by double quotes. You may include different entries from the same game series (e.g., "Resident Evil 1", "Resident Evil 2", "Dark Souls 1", "Dark Souls 2"). Do not include additional information like release dates, descriptions, or genres.']
,                    ['role' => 'user', 'content' => $description],
                ],
                'max_tokens' => 300,
                'temperature' => 0.7,
            ]);

        //dd($response->body());

        return $response->json('choices.0.message.content');
    }
}
