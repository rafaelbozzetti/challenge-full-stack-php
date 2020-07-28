<?php

use App\Middleware\UserAuthMiddleware;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);

    $app->post('/auth', \App\Action\Auth\LoginSubmitAction::class);

    $app->get('/logout', \App\Action\Auth\LogoutAction::class);


    //$app->get('/students', \App\Action\Students\StudentsListDataTableAction::class)->add(UserAuthMiddleware::class);

    $app->get('/students', \App\Action\Student\StudentListDataTableAction::class);

    // Add Student
    $app->get('/students/add', \App\Action\Student\StudentCreateFormAction::class);

    $app->post('/students/add', \App\Action\Student\StudentCreateAction::class);

    // Edit Student
    $app->get('/students/edit/{id}', \App\Action\Student\StudentEditFormAction::class);

    $app->post('/students/edit', \App\Action\Student\StudentEditAction::class);

    // Remove Student
    $app->get('/students/remove/{id}', \App\Action\Student\StudentRemoveFormAction::class);

    $app->post('/students/remove', \App\Action\Student\StudentRemoveAction::class);

};
