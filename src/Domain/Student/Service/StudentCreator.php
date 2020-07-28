<?php

namespace App\Domain\Student\Service;

use App\Domain\Student\Repository\StudentCreatorRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class StudentCreator
{
    /**
     * @var StudentCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param StudentCreatorRepository $repository The repository
     */
    public function __construct(StudentCreatorRepository $repository)
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
    public function createStudent(array $data): int
    {
        // Input validation
        $this->validateNewStudent($data);

        // Insert student
        $studentId = $this->repository->insertStudent($data);

        // Logging here: Student created successfully
        //$this->logger->info(sprintf('Student created successfully: %s', $studentId));

        return $studentId;
    }

    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @throws ValidationException
     *
     * @return void
     */
    private function validateNewStudent(array $data): void
    {
        $errors = [];

        // Here you can also use your preferred validation library

        if (empty($data['studentname'])) {
            $errors['studentname'] = 'Input required';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Input required';
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email address';
        }

        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}