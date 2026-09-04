<?php

namespace App\Reviewers;

use App\Interfaces\Reviewer;
use OpenAI\Client;

class OpenAIReviewer extends BaseReviewer
{
    private Client $client;

    public function __construct()
    {
        $this->client = \OpenAI::client($_ENV['OPENAI_API_KEY']);
        parent::__construct();
    }

    public function review(string $file): string
    {
        $code = file_get_contents($file);

        $response = $this->client->responses()->create([
            'model' => 'gpt-4o',
            'input' => $this->prompt ." ({$file}):\n\n```php\n{$code}\n```",
        ]);

        return $response->outputText; // Hello! How can I assist you today?
    }
}