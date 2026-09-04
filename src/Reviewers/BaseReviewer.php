<?php

namespace App\Reviewers;

use App\Interfaces\Reviewer;

abstract class BaseReviewer implements Reviewer
{
    protected string $prompt;

    public function __construct()
    {
        $this->setPrompt();
    }

    protected function getFileText($filePath): string
    {
        return file_get_contents($filePath);
    }

    private function setPrompt() {
        $this->prompt = "Мне нужно, чтобы ты проревьювил этот файл на безопасность,
        стиль и так далее. Хочу, чтобы ты покритиковал код и предложил альтернативу.";
    }
}