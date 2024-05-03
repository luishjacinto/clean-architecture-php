<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Exceptions;

class StudentWithMoreThanTwoPhones extends \DomainException {

    public function __construct() {
        parent::__construct("Student cannot have more than 2 phones");
    }

}