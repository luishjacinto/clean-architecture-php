<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain;

interface Event {

    public function moment(): \DateTimeImmutable;

}