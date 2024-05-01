<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain\Students\Exceptions;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Phone;

class PhoneAlreadyExists extends \DomainException {

    public function __construct(Phone $phone) {
        parent::__construct("The phone '".((string) $phone)."' already exists");
    }

}