<?php

namespace Luishjacinto\CleanArchitecturePhp\Application\Recommendations;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Student;

interface SendRecommendationEmail {

    public function sendTo(Student $recommendedStudent): void;

}