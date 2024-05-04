<?php

namespace Luishjacinto\CleanArchitecturePhp\Gamification\Application\Labels;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;

class GetLabelsByCPFDto {

    private CPF $studentCPF;

    public function __construct(CPF $studentCPF) {
        $this->studentCPF = $studentCPF;
    }

    public function getStudentCPF() {
        return $this->studentCPF;
    }

}