<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Application\Students;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Repository;

class AddPhone {

    public static function add(AddPhoneDto $dto, Repository $repository){
        $cpf = new CPF($dto->getStudentCPFNumber());

        $student = $repository->getByCPF($cpf);
        $student->addPhone($dto->getPhoneDDD(), $dto->getPhoneNumber());

        $repository->update($student);
    }

}