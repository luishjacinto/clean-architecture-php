<?php

namespace Luishjacinto\CleanArchitecturePhp\Application\Students;
use Luishjacinto\CleanArchitecturePhp\Domain\CPF;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Repository;

class AddPhone {

    public static function add(AddPhoneDto $dto, Repository $repository){
        $cpf = new CPF($dto->getStudentCPFNumber());

        $student = $repository->getByCPF($cpf);
        $student->addPhone($dto->getPhoneDDD(), $dto->getPhoneNumber());

        $repository->update($student);
    }

}