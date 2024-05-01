<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain\Students\Exceptions;
use Luishjacinto\CleanArchitecturePhp\Domain\Email;

class InvalidEmailAddress extends \DomainException {

    public function __construct(Email $email) {
        parent::__construct("The email address '".((string) $email)."' is invalid");
    }

}