<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Application\Recommendations;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Student;

interface SendRecommendationEmail {

    public function sendTo(Student $recommendedStudent): void;

}