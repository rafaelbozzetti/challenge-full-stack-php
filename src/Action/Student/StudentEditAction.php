<?php

namespace App\Action\Student;

use App\Domain\Student\Service\StudentCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class StudentEditAction
{
    private $studentCreator;

    public function __construct(StudentCreator $studentCreator)
    {
        $this->studentCreator = $studentCreator;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        $studentId = $this->studentCreator->createStudent($data);

        $result = [
            'student_id' => $studentId
        ];

        // $response->getBody()->write((string)json_encode($result));

        // return $response
        //     ->withHeader('Content-Type', 'application/json')
        //     ->withStatus(201);
    }
}