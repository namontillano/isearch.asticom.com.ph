<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
try {
    $dotenv->load();
    $dotenv->required(['REDIRECT_URI'])->notEmpty();
} catch ( Exception $e )  {
    echo $e->getMessage();
}

?>