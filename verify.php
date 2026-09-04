<?php

require __DIR__ . '/vendor/autoload.php';

use App\Exceptions\ArgumentException;
use App\Services\RequestService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // папка, где лежит .env
$dotenv->load();

$request = new RequestService($argv);

try{
    $arguments = $request->getArguments();
    $reviewer = $arguments['reviewer'];
    $file = $arguments['filePath'];
    $service = new \App\Services\ReviewService($reviewer);
}catch (ArgumentException $e) {
    print $e->getMessage();
    exit;
}


echo $service->review($file);
