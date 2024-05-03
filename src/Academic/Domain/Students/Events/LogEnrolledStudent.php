<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Events;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\Event;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\EventListener;

class LogEnrolledStudent extends EventListener {

    public function knowHowToProcess(Event $event): bool {
        return $event instanceof EnrolledStudent;
    }

    /**
     * @param EnrolledStudent $enrolledStudent
    */

    public function reactTo(Event $enrolledStudent): void {
        echo "Student with cpf number {$enrolledStudent->studentCPF()} was enrolled at {$enrolledStudent->moment()->format('d/m/Y')}";
    }

}