<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Application\Students;

class EnrollStudentDto {
    private string $cpfNumber;
    private string $emailAddress;
    private string $name;

    public function __construct(string $cpfNumber, string $emailAddress, $name) {
        $this->cpfNumber = $cpfNumber;
        $this->emailAddress = $emailAddress;
        $this->name = $name;
    }

    public function getCPFNumber(){
        return $this->cpfNumber;
    }

    public function getEmailAddress(){
        return $this->emailAddress;
    }

    public function getName(){
        return $this->name;
    }

}