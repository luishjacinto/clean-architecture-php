<?php

namespace Luishjacinto\CleanArchitecturePhp;

class Recommendation {

    private Student $recommended;
    private Student $referrer;

    public function __construct(Student $recommended, Student $referrer) {
        $this->recommended = $recommended;
        $this->referrer = $referrer;
    }

}