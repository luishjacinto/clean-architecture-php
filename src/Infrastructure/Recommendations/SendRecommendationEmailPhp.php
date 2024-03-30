<?php

namespace Luishjacinto\CleanArchitecturePhp\Infrastructure\Recommendations;

use Luishjacinto\CleanArchitecturePhp\Application\Recommendations\SendRecommendationEmail;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Student;

class SendRecommendationEmailPhp implements SendRecommendationEmail {

    public function sendTo(Student $recommendedStudent): void {
        mail(
            $recommendedStudent->getEmail(),
            'Você foi recomendado',
            '...',
        );
    }

}