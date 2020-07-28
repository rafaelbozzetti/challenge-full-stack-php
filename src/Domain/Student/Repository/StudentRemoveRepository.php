<?php

namespace App\Domain\Student\Repository;

use PDO;

/**
 * Repository.
 */
class StudentRemoveRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert student row.
     *
     * @param array $student The student
     *
     * @return int The new ID
     */
    public function removeStudent(array $student): int
    {
        $row = [
            'id' => $student['id']
        ];

        $sql = "DELETE FROM students 
                WHERE id=:id ";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}