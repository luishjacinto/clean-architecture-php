<?php

namespace Luishjacinto\CleanArchitecturePhp\Application\Students;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Repository;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Student;

class EnrollStudent {

    public static function enroll(EnrollStudentDto $dto, Repository $repository){
        $student = Student::build(
            $dto->getCPFNumber(),
            $dto->getEmailAddress(),
            $dto->getName()
        );

        $repository->add($student);
    }

}