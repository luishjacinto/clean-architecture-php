<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain\Students\Exceptions;
use Luishjacinto\CleanArchitecturePhp\Domain\CPF;

class InvalidCPFFormat extends \DomainException {

    public function __construct(CPF $cpf) {
        parent::__construct("The cpf number '".((string) $cpf)."' format is invalid");
    }

}