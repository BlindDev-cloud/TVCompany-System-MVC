<?php

use Core\BaseException;
use Core\Router;
use Core\View;
use Dotenv\Dotenv;

if(!session_id()){
    session_start();
}

require_once dirname(__DIR__) . '/config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

$dotenv = Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

try {

    require_once BASE_DIR . '/routes/web.php';

    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])) {
        Router::dispatch($_SERVER['REQUEST_URI']);
    }

}catch (BaseException $exception){
    View::render('errorPage', [
        'message' => $exception->getMessage(),
        'code' => $exception->getCode()
    ]);
}