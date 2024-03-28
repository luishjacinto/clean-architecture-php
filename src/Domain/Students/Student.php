<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain\Students;

use Luishjacinto\CleanArchitecturePhp\Domain\CPF;
use Luishjacinto\CleanArchitecturePhp\Domain\Email;


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

    public static function build(string $cpfNumber, string $emailAddress, string $name): Student {
        $student = new Student(
            new CPF($cpfNumber),
            new Email($emailAddress),
            $name
        );

        return $student;
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