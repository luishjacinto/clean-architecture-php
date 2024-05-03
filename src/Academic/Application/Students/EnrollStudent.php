<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Application\Students;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\EventPublisher;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Events\EnrolledStudent;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Repository;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Student;


class EnrollStudent {

    public static function enroll(EnrollStudentDto $dto, Repository $repository, EventPublisher $eventPublisher){
        $student = Student::build(
            $dto->getCPFNumber(),
            $dto->getEmailAddress(),
            $dto->getName()
        );

        $repository->add($student);

        $event = new EnrolledStudent(
            $student->getCPF()
        );
        $eventPublisher->publish(
            $event
        );
    }

}