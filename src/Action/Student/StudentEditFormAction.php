<?php

namespace App\Action\Student;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class StudentEditFormAction
{
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        
        $viewData = [];
        $studentId = (int)$args['id'];

        // query student
        
        return $this->twig->render($response, 'student_edit.twig', $viewData);
    }
}