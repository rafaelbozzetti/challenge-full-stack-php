<?php

use Selective\BasePath\BasePathMiddleware;
use Slim\Views\TwigMiddleware;
use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use App\Middleware\SessionMiddleware;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    $app->add(SessionMiddleware::class);

    $app->add(TwigMiddleware::class);

    $app->add(BasePathMiddleware::class);
    
    $app->add(ErrorMiddleware::class);

    $app->addRoutingMiddleware();
    
};