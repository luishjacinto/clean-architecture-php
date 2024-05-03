<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain;

class EventPublisher {

    private array $listeners = [];

    public function addListener(EventListener $listener): self{
        $this->listeners[] = $listener;

        return $this;
    }

    public function publish(Event $event): self {
        foreach ($this->listeners as $listener) {
            $listener->process($event);
        }

        return $this;
    }

}