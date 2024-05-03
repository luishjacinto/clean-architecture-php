<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\Exceptions;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;

class InvalidCPFNumber extends \DomainException {

    public function __construct(CPF $cpf) {
        parent::__construct("The cpf number '".((string) $cpf)."' is invalid");
    }

}