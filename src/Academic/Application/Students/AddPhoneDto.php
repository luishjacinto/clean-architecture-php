<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Application\Students;

class AddPhoneDto {

    private string $studentCPFNumber;
    private string $phoneDDD;
    private string $phoneNumber;

    public function __construct(string $studentCPFNumber, string $phoneDDD, string $phoneNumber) {
        $this->studentCPFNumber = $studentCPFNumber;
        $this->phoneDDD = $phoneDDD;
        $this->phoneNumber = $phoneNumber;
    }

    public function getStudentCPFNumber(){
        return $this->studentCPFNumber;
    }

    public function getPhoneDDD(){
        return $this->phoneDDD;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

}