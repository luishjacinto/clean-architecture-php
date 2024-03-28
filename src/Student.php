<?php

namespace Luishjacinto\CleanArchitecturePhp;

class Student {

    private CPF $cpf;
    private Email $email;
    private string $name;

    private array $phones;

    public function addPhone(string $ddd, string $number) {
        $this->phones[] = new Phone($ddd, $number);
    }

}