<?php

namespace App\Services;

use App\Interfaces\Reviewer;

class ReviewService
{
    private Reviewer $reviewer;
    public function __construct(Reviewer $reviewer)
    {
        $this->reviewer = $reviewer;
    }

    public function review(string $file) : string
    {
        return $this->reviewer->review($file);
    }
}