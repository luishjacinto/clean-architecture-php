<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Exceptions;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Phone;

class InvalidPhoneNumber extends \DomainException {

    public function __construct(Phone $phone) {
        parent::__construct("The phone number '".((string) $phone)."' is invalid");
    }

}