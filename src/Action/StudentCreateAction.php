<?php

namespace App\Action;

use App\Domain\Student\Service\StudentCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class StudentCreateAction
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

        // Invoke the Domain with inputs and retain the result
        $studentId = $this->studentCreator->createStudent($data);

        // Transform the result into the JSON representation
        $result = [
            'student_id' => $studentId
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}