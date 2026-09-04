<?php

namespace App\Reviewers;

use Anthropic\Client;

class AnthropicReviewer extends BaseReviewer
{

    public function __construct()
    {
        parent::__construct();
        $this->updatePrompt();
    }

    private function updatePrompt(): void
    {
        $this->prompt .= PHP_EOL . "Читай только то, что я тебе передал и не исследуй проект. 
        Не ходи по папкам и не читай файлы.";
    }

    public function review(string $file): string
    {
        $code = $this->getFileText($file);
        $prompt = $this->prompt . $code;

        return shell_exec('claude -p ' . escapeshellarg($prompt) . ' 2>&1');
    }
}