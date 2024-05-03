<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain;

abstract class EventListener {

    public function process(Event $event) {
        if ($this->knowHowToProcess($event)) {
            $this->reactTo($event);
        }
    }

    abstract public function knowHowToProcess(Event $event): bool;
    abstract public function reactTo(Event $event): void;

}