<?php

use App\Middleware\UserAuthMiddleware;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('login');

    $app->post('/auth', \App\Action\Auth\LoginSubmitAction::class);

    $app->get('/logout', \App\Action\Auth\LogoutAction::class);


    $app->get('/students', \App\Action\Student\StudentListDataTableAction::class)->add(UserAuthMiddleware::class)->setName('students');
    $app->post('/students', \App\Action\Student\StudentListDataTableAction::class)->add(UserAuthMiddleware::class)->setName('students-post');

    // Add Student
    $app->get('/students/add', \App\Action\Student\StudentCreateFormAction::class)->add(UserAuthMiddleware::class);

    $app->post('/students/add', \App\Action\Student\StudentCreateAction::class)->add(UserAuthMiddleware::class);

    // Edit Student
    $app->get('/students/edit/{id}', \App\Action\Student\StudentEditFormAction::class)->add(UserAuthMiddleware::class);

    $app->post('/students/edit', \App\Action\Student\StudentEditAction::class)->add(UserAuthMiddleware::class);

    // Remove Student
    $app->get('/students/remove/{id}', \App\Action\Student\StudentRemoveFormAction::class)->add(UserAuthMiddleware::class);

    $app->post('/students/remove', \App\Action\Student\StudentRemoveAction::class)->add(UserAuthMiddleware::class);

};
