<?php

use App\Middleware\UserAuthMiddleware;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);

    $app->post('/auth', \App\Action\Auth\LoginSubmitAction::class);

    $app->get('/logout', \App\Action\Auth\LogoutAction::class);


    //$app->get('/students', \App\Action\Students\StudentsListDataTableAction::class)->add(UserAuthMiddleware::class);

    $app->get('/students', \App\Action\Student\StudentListDataTableAction::class);

    $app->get('/students/add', \App\Action\Student\StudentCreateFormAction::class);

    $app->post('/students/add', \App\Action\Student\StudentCreateAction::class);



};
