<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Infrastructure\Students;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Exceptions\PhoneAlreadyExists;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Exceptions\StudentNotFound;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Student;

/**
 * @implements Students\Repository
*/
class RepositoryInMemory implements Students\Repository {

    /**
     * @var Student[] $students;
    */
    private array $students = [];

    /**
     * @var Student[] $phones;
    */
    private array $phones = [];

    /**
     * @return Student[]
    */

    public function get(): array {
        return array_values($this->students);
    }

    public function getByCPF(CPF $cpf): Student {
        $student = $this->students[(string) $cpf];

        if (empty($student)) {
            throw new StudentNotFound;
        }

        return $student;
    }

    /**
     * @param Student $student
    */

    public function add($student): void {
        $this->students[(string) $student->getCPF()] = $student;
        $this->insertPhones($student);
    }

    /**
     * @param Student $student
    */

    public function update($student): void {
        $this->deletePhones($student);
        $this->insertPhones($student);
        $this->students[(string) $student->getCPF()] = $student;
    }

    /**
     * @param Student $student
    */

    public function remove($student): void {
        $this->deletePhones($student);
        unset($this->students[(string) $student->getCPF()]);
    }

    public function insertPhones(Student $student): void {
        foreach ($student->getPhones() as $phone) {
            if (!empty($this->phones[(string) $phone])) {
                throw new PhoneAlreadyExists($phone);
            } else {
                $this->phones[(string) $phone] = $phone;
            }
        }
    }

    public function deletePhones(Student $student): void {
        foreach ($student->getPhones() as $phone) {
            unset($this->phones[(string) $phone]);
        }
    }

}