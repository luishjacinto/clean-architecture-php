<?php

namespace Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;

class Label {

    private CPF $studentCPF;
    private string $name;

    public function __construct(CPF $studentCPF, string $name) {
        $this->studentCPF = $studentCPF;
        $this->name = $name;
    }

    public function studentCPF(): CPF {
        return $this->studentCPF;
    }

    public function __toString(): string {
        return $this->name;
    }

}