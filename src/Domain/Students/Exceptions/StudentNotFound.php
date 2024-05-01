<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain\Students\Exceptions;

class StudentNotFound extends \DomainException {

    public function __construct() {
        parent::__construct("Student not found");
    }

}