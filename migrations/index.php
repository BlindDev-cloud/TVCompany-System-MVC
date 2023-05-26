<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Core\BaseException;
use Dotenv\Dotenv;
use Migrations\Migration;

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

try {
    $migration = new Migration();

    $migration->checkMigrationsTable();
    $migration->runMigrations();
    $migration->checkSuperuser();

} catch (PDOException $exception) {
    dd($exception->getMessage());
}catch (BaseException $exception){
    dd($exception->getMessage());
}