<?php

namespace App\Action\Student;

use App\Domain\Student\Service\StudentUpdate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class StudentEditAction
{
    private $studentUpdate;

    public function __construct(StudentUpdate $studentUpdate)
    {
        $this->studentUpdate = $studentUpdate;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        $data = (array)$request->getParsedBody();

        $studentId = $this->studentUpdate->updateStudent($data);

        $result = [
            'student_id' => $studentId
        ];

        header('Location: /students');
        exit;

    }
}