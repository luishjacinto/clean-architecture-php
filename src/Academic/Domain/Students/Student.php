<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\Emails\Email;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Exceptions\StudentWithMoreThanTwoPhones;


class Student {

    private CPF $cpf;
    private Email $email;
    private string $name;
    private array $phones = [];

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
        if (count($this->phones) >= 2) {
            throw new StudentWithMoreThanTwoPhones;
        }
        $this->phones[] = new Phone($phoneDDD, $phoneNumber);

        return $this;
    }

}