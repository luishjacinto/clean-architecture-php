<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain;

interface Event extends \JsonSerializable {

    public function moment(): \DateTimeImmutable;

}