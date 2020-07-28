<?php

namespace App\Domain\Student\Service;

use App\Domain\Student\Repository\StudentUpdateRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class StudentUpdate
{
    /**
     * @var StudentUpdateRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param StudentUpdateRepository $repository The repository
     */
    public function __construct(StudentUpdateRepository $repository)
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
    public function updateStudent(array $data): int
    {
        $this->validateNewStudent($data);

        // Insert student
        $studentId = $this->repository->updateStudent($data);

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
        if (empty($data['id'])) {
            $errors['id'] = 'Input required';
        }

        if (empty($data['name'])) {
            $errors['name'] = 'Input required';
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