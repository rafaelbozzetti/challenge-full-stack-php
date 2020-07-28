<?php

namespace App\Domain\Student\Service;

use App\Domain\Student\Repository\StudentRemoveRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class StudentRemove
{
    /**
     * @var StudentRemoveRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param StudentRemoveRepository $repository The repository
     */
    public function __construct(StudentRemoveRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new student.
     *
     * @param array $data The form data
     *
     * @return int The new student ID
     */
    public function removeStudent(array $data): int
    {
        $studentId = $this->repository->removeStudent($data);

        return true;
    }
}