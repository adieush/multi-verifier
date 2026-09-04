<?php
namespace App\Services;
use App\Exceptions\ArgumentException;
use App\Helpers\ReviewerHelper;

class RequestService
{
    private array $arguments;
    public function __construct(array $argv)
    {
        $this->arguments = $argv;
    }

    public function getArguments()
    {
        if(empty($this->arguments[1])){
            throw new ArgumentException("First string argument not found. Should be filename");
        }
        $fileChecker = new FileCheckService($this->arguments[1]);

        $response = [
            "filePath" => $fileChecker->fileExists() ? $fileChecker->getFilePath() : null,
            "reviewer" => !empty($this->arguments[2]) ? ReviewerHelper::getReviewer($this->arguments[2]) : null
        ];

        try {
            if(empty($response["filePath"])) throw new ArgumentException("File not found.  First string argument");
            if(empty($response["reviewer"])) throw new ArgumentException("Reviewer not found. Second string argument");
        } catch (ArgumentException $e) {
            print $e->getMessage();
            exit;
        }
        
        return $response;
    }

}