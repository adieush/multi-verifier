<?php

namespace App\Helpers;

use App\Interfaces\Reviewer;
use App\Reviewers\AnthropicReviewer;
use App\Reviewers\FakeReviewer;
use App\Reviewers\OpenAIReviewer;

class ReviewerHelper
{
    static function getReviewer(string $reviewer) : Reviewer
    {
        return match ($reviewer) {
            'anthropic' => new AnthropicReviewer(),
            'openai' => new OpenAIReviewer(),
            default => new FakeReviewer(),
        };
    }
}