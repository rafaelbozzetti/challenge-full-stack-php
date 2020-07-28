<?php

namespace App\Action\Student;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class StudentCreateFormAction
{
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        
        $viewData = [];
        
        return $this->twig->render($response, 'student_add.twig', $viewData);
    }
}