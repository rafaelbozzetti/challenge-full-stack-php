<?php

namespace App\Domain\Student\Service;

use App\Domain\Student\Data\StudentReaderResult;
use App\Domain\Student\Repository\StudentViewerRepository;

/**
 * Service.
 */
final class StudentReader
{
    /**
     * @var StudentViewerRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param StudentViewerRepository $repository The repository
     */
    public function __construct(StudentViewerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Read a student.
     *
     * @param int $studentId The student id
     *
     * @return StudentReaderResult The student
     */
    public function getStudentViewData(int $studentId): StudentReaderResult
    {
        // Input validation
        // ...

        // Fetch data from the database
        $studentRow = $this->repository->getStudentById($studentId);

        // Add or invoke your complex business logic here
        $student = new StudentReaderResult();
        $student->id = (int)$studentRow['id'];
        $student->name = (string)$studentRow['name'];
        $student->email = (string)$studentRow['email'];
        $student->ar = (string)$studentRow['ar'];
        $student->document = (string)$studentRow['document'];

        return $student;
    }
}