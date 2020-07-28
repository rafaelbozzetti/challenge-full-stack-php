<?php

namespace App\Domain\Student\Repository;

use App\Factory\QueryFactory;
use App\Repository\RepositoryInterface;
use App\Repository\TableName;
use DomainException;

/**
 * Repository.
 */
final class StudentViewerRepository implements RepositoryInterface
{
    /**
     * @var QueryFactory The query factory
     */
    private $queryFactory;

    /**
     * The constructor.
     *
     * @param QueryFactory $queryFactory The query factory
     */
    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    /**
     * Get student by id.
     *
     * @param int $studentId The student id
     *
     * @throws DomainException
     *
     * @return array The student row
     */
    public function getStudentById(int $studentId): array
    {
        $query = $this->queryFactory->newSelect(TableName::STUDENTS);
        $query->select([
            'id',
            'name',
            'email',
            'ar',
            'document'
        ]);

        $query->andWhere(['id' => $studentId]);

        $row = $query->execute()->fetch('assoc');

        if (!$row) {
            throw new DomainException(__('Student not found: %s', $studentId));
        }

        return $row;
    }

    /**
     * Find all students.
     *
     * @return array A list of students
     */
    public function findAllStudents(): array
    {
        $query = $this->queryFactory->newSelect(TableName::USERS)->select('*');

        return $query->execute()->fetchAll('assoc') ?: [];
    }
}