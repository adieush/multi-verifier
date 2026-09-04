<?php

namespace App\Reviewers;

use App\Interfaces\Reviewer;

class FakeReviewer implements Reviewer
{
    public function review(string $file): string
    {
        return 'Я проверил файл. Мне все понравилось. Код написан отлично';
    }
}