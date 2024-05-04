<?php

namespace Luishjacinto\CleanArchitecturePhp\Gamification\Application\Labels;

use Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels\Label;
use Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels\Repository;

class GetLabelsByCPF {

    /**
     * @return Label[]
    */

    public static function get(GetLabelsByCPFDto $getLabelsByCPFDto, Repository $repository): array {
        return $repository->getByStudentCPF($getLabelsByCPFDto->getStudentCPF());
    }

}