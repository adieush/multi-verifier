<?php

namespace App\Interfaces;

interface Reviewer {
    public function review(string $file): string;
}