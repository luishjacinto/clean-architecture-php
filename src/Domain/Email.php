<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\Exceptions\InvalidEmailAddress;

class Email implements \Stringable {

    private string $address;

    public function __construct(string $address) {
        $this->address = $address;
        $this->validate($address);
    }

    private function validate(string $address) {
        $addressInvalid = filter_var($address, FILTER_VALIDATE_EMAIL) === false;

        if ($addressInvalid) {
            throw new InvalidEmailAddress($this);
        }
    }

    public function __toString(): string {
        return $this->address;
    }


}