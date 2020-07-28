<?php

namespace App\Action\Student;

use App\Domain\Student\Service\StudentRemove;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class StudentRemoveAction
{
    private $studentRemove;

    public function __construct(StudentRemove $studentRemove)
    {
        $this->studentRemove = $studentRemove;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        $data = (array)$request->getParsedBody();

        $this->studentRemove->removeStudent($data);

        header('Location: /students');
        exit;
    }
}