<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Events;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\Event;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;

class EnrolledStudent implements Event {

    private \DateTimeImmutable $moment;
    private CPF $studentCPF;

    public function __construct(CPF $studentCPF) {
        $this->moment = new \DateTimeImmutable;
        $this->studentCPF = $studentCPF;
    }

    public function moment(): \DateTimeImmutable {
        return $this->moment;
    }

    public function studentCPF(): CPF {
        return $this->studentCPF;
    }

}