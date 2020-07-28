<?php

namespace App\Action\Student;

use App\Domain\Student\Service\StudentReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class StudentRemoveFormAction
{
    private $twig;

    /**
     * @var StudentReader
     */
    private $studentReader;

    public function __construct(Twig $twig, StudentReader $studentReader)
    {
        $this->twig = $twig;

        $this->studentReader = $studentReader;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        
        $viewData = [];
        $studentId = (int)$args['id'];

        $viewData['student'] = $this->studentReader->getStudentViewData($studentId);
        
        return $this->twig->render($response, 'student_remove.twig', $viewData);
    }
}