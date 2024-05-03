<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\Exceptions;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;

class InvalidCPFFormat extends \DomainException {

    public function __construct(CPF $cpf) {
        parent::__construct("The cpf number '".((string) $cpf)."' format is invalid");
    }

}