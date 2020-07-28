<?php

namespace App\Action\Student;

use App\Domain\Student\Service\StudentCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Responder\Responder;

final class StudentCreateAction
{
    private $studentCreator;

    private $responder;

    public function __construct(Responder $responder,  StudentCreator $studentCreator)
    {
        $this->studentCreator = $studentCreator;
        $this->responder = $responder;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        $data = (array)$request->getParsedBody();

        $studentId = $this->studentCreator->createStudent($data);

        $result = [
            'student_id' => $studentId
        ];

        header('Location: /students');
        exit;

        //return $this->responder->redirect($response, 'students');
    }
}