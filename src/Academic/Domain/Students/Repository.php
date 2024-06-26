<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;

/**
 * @implements Domain\Repository<Student>
*/
interface Repository extends Domain\Repository {

    /**
     * @return Student[]
    */

    public function get(): array;

    public function getByCPF(CPF $cpf): Student;

    /**
     * @param Student $student
    */

    public function add($student): void;

    /**
     * @param Student $student
    */

    public function update($student): void;

    /**
     * @param Student $student
    */

    public function remove($student): void;

    public function insertPhones(Student $student): void;

    public function deletePhones(Student $student): void;

}