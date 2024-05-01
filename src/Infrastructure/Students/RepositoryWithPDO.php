<?php

namespace Luishjacinto\CleanArchitecturePhp\Infrastructure\Students;

use Luishjacinto\CleanArchitecturePhp\Domain\CPF;
use Luishjacinto\CleanArchitecturePhp\Domain\Students;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Student;
use Luishjacinto\CleanArchitecturePhp\Infrastructure;

/**
 * @implements Students\Repository
*/
class RepositoryWithPDO extends Infrastructure\RepositoryWithPDO implements Students\Repository {

    /**
     * @return Student[]
    */

    public function get(): array {
        $sql =
        "    SELECT
                cpf,
                name,
                email,
                ddd,
                number
            FROM students
            LEFT JOIN students_phones ON
                students_phones.student_cpf = cpf
        ";

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $this->mapResults($results);
    }

    public function getByCPF(CPF $cpf): Student {
        $sql =
        "    SELECT
                cpf,
                name,
                email,
                ddd,
                number
            FROM students
            LEFT JOIN students_phones ON
                students_phones.student_cpf = cpf
            WHERE cpf = :cpf;
        ";

        $statement = $this->connection->prepare($sql);
        $statement->bindValue('cpf', (string) $cpf);
        $statement->execute();

        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if (count($results) === 0) {
            throw new \Exception('Aluno não encontrado');
        }

        return $this->mapResults($results)[0];
    }

    /**
     * @param Student $student
    */

    public function add($student): void {
        $sql = 'INSERT INTO students VALUES (:cpf, :name, :email);';

        $statement = $this->connection->prepare($sql);
        $statement->bindValue('cpf', (string) $student->getCPF());
        $statement->bindValue('name', $student->getName());
        $statement->bindValue('email', (string) $student->getEmail());
        $statement->execute();

        $this->insertPhones($student);
    }

    /**
     * @param Student $student
    */

    public function update($student): void {
        $sql = "UPDATE students SET name = :name, email = :email WHERE cpf = :cpf;";

        $statement = $this->connection->prepare($sql);
        $statement->bindValue('cpf', (string) $student->getCPF());
        $statement->bindValue('name', $student->getName());
        $statement->bindValue('email', (string) $student->getEmail());
        $statement->execute();

        $this->deletePhones($student);
        $this->insertPhones($student);
    }

    /**
     * @param Student $student
    */

    public function remove($student): void {
        $sql = "DELETE FROM students WHERE cpf = :cpf;";

        $statement = $this->connection->prepare($sql);
        $statement->bindValue('cpf', (string) $student->getCPF());
        $statement->execute();

        $this->deletePhones($student);
    }

    public function insertPhones(Student $student): void {
        $sql = "INSERT INTO students_phones VALUES (:ddd, :number, :student_cpf);";

        $statement = $this->connection->prepare($sql);

        foreach ($student->getPhones() as $phone) {
            $statement->bindValue('ddd', (string) $phone->getDDD());
            $statement->bindValue('number', (string) $phone->getNumber());
            $statement->bindValue('student_cpf', (string) $student->getCPF());
            $statement->execute();
        }
    }

    public function deletePhones(Student $student): void {
        $sql = "DELETE FROM students_phones WHERE student_cpf = :student_cpf;";

        $statement = $this->connection->prepare($sql);
        $statement->bindValue('student_cpf', (string) $student->getCPF());
        $statement->execute();
    }

    /**
     * @return Student[]
    */

    private function mapResults(array $results): array {
        $students = [];

        foreach ($results as $result) {
            if (!empty($students[$result['cpf']])) {
                $student = $students[$result['cpf']];
            } else {
                $student = Student::build($result['cpf'], $result['email'], $result['name']);
                $students[$result['cpf']] = $student;
            }

            if (!empty($result['ddd']) && !empty($result['number'])) {
                $student->addPhone($result['ddd'], $result['number']);
            }
        }

        return array_values($students);
    }
}