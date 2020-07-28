<?php

namespace App\Domain\Student\Repository;

use PDO;

/**
 * Repository.
 */
class StudentCreatorRepository
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
    public function insertStudent(array $student): int
    {
        $row = [
            'name' => $student['name'],
            'email' => $student['email'],
            'ar' => $student['ar'],
            'document' => $student['document'],
        ];

        $sql = "INSERT INTO students SET 
                name=:name, 
                email=:email, 
                ar=:ar, 
                document=:document;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}