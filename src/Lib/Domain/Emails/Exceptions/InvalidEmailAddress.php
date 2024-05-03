<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain\Emails\Exceptions;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\Emails\Email;

class InvalidEmailAddress extends \DomainException {

    public function __construct(Email $email) {
        parent::__construct("The email address '".((string) $email)."' is invalid");
    }

}