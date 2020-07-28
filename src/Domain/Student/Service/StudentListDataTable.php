<?php

namespace App\Domain\Student\Service;

use App\Domain\Student\Repository\StudentListDataTableRepository;

/**
 * Service.
 */
final class StudentListDataTable
{
    /**
     * @var StudentListDataTableRepository
     */
    private $repository;

    /**
     * Constructor.
     *
     * @param StudentListDataTableRepository $repository The repository
     */
    public function __construct(StudentListDataTableRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all users.
     *
     * @param array $params The parameters
     *
     * @return array The result
     */
    public function listAllStudents(array $params): array
    {
        return $this->repository->getTableData($params);
    }
}
