<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Exceptions;

class StudentNotFound extends \DomainException {

    public function __construct() {
        parent::__construct("Student not found");
    }

}