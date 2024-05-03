<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Recommendations;

use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Student;

class Recommendation {

    private Student $recommended;
    private Student $referrer;
    private \DateTimeImmutable $recommended_at;

    public function __construct(Student $recommended, Student $referrer) {
        $this->recommended = $recommended;
        $this->referrer = $referrer;
        $this->recommended_at = new \DateTimeImmutable();
    }

}