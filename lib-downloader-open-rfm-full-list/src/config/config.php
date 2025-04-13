<?php

use Dotenv\Dotenv;

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

return [
    'output_file_path' => $_ENV['OUTPUT_FILE_PATH'],
    'output_file_name' => $_ENV['OUTPUT_FILE_NAME']
];