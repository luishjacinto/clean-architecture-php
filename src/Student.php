<?php

namespace Luishjacinto\CleanArchitecturePhp;


class Student {

    private CPF $cpf;
    private Email $email;
    private string $name;
    private array $phones;

    public function __construct(CPF $cpf, Email $email, string $name) {
        $this->cpf = $cpf;
        $this->email = $email;
        $this->name = $name;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    /** @return Phone[] */

    public function getPhones() {
        return $this->phones;
    }

    public function addPhone(string $phoneDDD, string $phoneNumber) {
        $this->phones[] = new Phone($phoneDDD, $phoneNumber);

        return $this;
    }

}