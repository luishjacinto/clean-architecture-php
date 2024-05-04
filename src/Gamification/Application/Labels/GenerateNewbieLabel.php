<?php

namespace Luishjacinto\CleanArchitecturePhp\Gamification\Application\Labels;

use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Events\EnrolledStudent;
use Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels\Label;
use Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels\Repository;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\Event;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\EventListener;

class GenerateNewbieLabel extends EventListener {

    private Repository $repository;

    public function __construct(Repository $repository) {
        $this->repository = $repository;
    }

    public function knowHowToProcess(Event $event): bool {
        return get_class($event) === 'Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Events\EnrolledStudent';
    }

    /**
     * @param EnrolledStudent $enrolledStudent
    */

    public function reactTo(Event $event): void{
        $data = $event->jsonSerialize();
        $studentCPF = $data['studentCPF'];

        $label = new Label(new CPF($studentCPF), 'newbie');

        $this->repository->add($label);
    }

}