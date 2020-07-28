<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);

    $app->post('/students', \App\Action\StudentCreateAction::class);
};


