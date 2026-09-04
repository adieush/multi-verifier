<?php

namespace App\Services;

class FileCheckService
{
    private string $path;
    private string $fileName;
    public function __construct(string $fileName)
    {
        $this->path = dirname(__DIR__, 2) . "/";
        $this->fileName = $fileName;
    }

    public function fileExists(): bool
    {
        $filePath = $this->path . $this->fileName;

        return is_file($filePath);
    }

    public function getFilePath(): string
    {
        return $this->path . $this->fileName;
    }
}