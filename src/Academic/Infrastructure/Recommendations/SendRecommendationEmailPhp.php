<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Infrastructure\Recommendations;

use Luishjacinto\CleanArchitecturePhp\Academic\Application\Recommendations\SendRecommendationEmail;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Student;

class SendRecommendationEmailPhp implements SendRecommendationEmail {

    public function sendTo(Student $recommendedStudent): void {
        mail(
            $recommendedStudent->getEmail(),
            'Você foi recomendado',
            '...',
        );
    }

}