<?php

require __DIR__ . '/vendor/autoload.php';
use App\Services\RequestService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // папка, где лежит .env
$dotenv->load();

$request = new RequestService($argv);

$arguments = $request->getArguments();
$reviewer = $arguments['reviewer'];
$file = $arguments['filePath'];
$service = new \App\Services\ReviewService($reviewer);

echo $service->review($file);
