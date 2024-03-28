<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain;

class Email implements \Stringable {

    private string $address;

    public function __construct(string $address) {
        $this->validate($address);
        $this->address = $address;
    }

    private function validate(string $address) {
        $addressInvalid = filter_var($address, FILTER_VALIDATE_EMAIL) === false;

        if ($addressInvalid) {
            throw new \InvalidArgumentException(
                "Endereço de e-mail '{$address}' inválido"
            );
        }
    }

    public function __toString(): string {
        return $this->address;
    }


}