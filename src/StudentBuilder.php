<?php

namespace Luishjacinto\CleanArchitecturePhp;

class StudentBuilder {

    private Student $student;

    private function __construct(string $cpfNumber, string $emailAddress, string $name) {
        $this->student = new Student(
            new CPF($cpfNumber),
            new Email($emailAddress),
            $name
        );
    }

    public static function new(string $cpfNumber, string $emailAddress, string $name): StudentBuilder {
        $builder = new self($cpfNumber, $emailAddress, $name);
        return $builder;
    }

    public function addPhone(string $phoneDDD, string $phoneNumber) {
        $this->student->addPhone($phoneDDD, $phoneNumber);

        return $this;
    }

    public function build() {
        return $this->student;
    }

}

