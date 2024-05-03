<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\Exceptions\InvalidCPFFormat;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\Exceptions\InvalidCPFNumber;

class CPF implements \Stringable {

    private string $number;

    public function __construct(string $number) {
        $this->number = $number;
        $this->validateFormat();
        $this->validateNumber();
    }

    private function validateFormat() {
        if (preg_match('/[a-zA-Z]/', $this->number)) {
            throw new InvalidCPFFormat($this);
        }

        $numberInvalid = filter_var(
            $this->number,
            FILTER_VALIDATE_REGEXP,
            [
                "options" => [
                    "regexp" => "/\d{3}\.\d{3}\.\d{3}\-\d{2}/"
                ]
            ]
        ) === false;

        if ($numberInvalid) {
            throw new InvalidCPFFormat($this);
        }
    }

    private function validateNumber() {
        $number = preg_replace('/[^0-9]/', '', $this->number);

        if (strlen($number) !== 11 || !ctype_digit($number)) {
            throw new InvalidCPFNumber($this);
        }

        $digits = substr($number, 0, 9);
        $sum = 0;

        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $sum += $digits[$i] * $j;
        }

        $remainder = $sum % 11;
        $digit1 = ($remainder < 2) ? 0 : (11 - $remainder);

        if ($digit1 != $number[9]) {
            throw new InvalidCPFNumber($this);
        }

        $sum = 0;
        $digits .= $digit1;

        for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
            $sum += $digits[$i] * $j;
        }

        $remainder = $sum % 11;
        $digit2 = ($remainder < 2) ? 0 : (11 - $remainder);

        if ($digit2 != $number[10]) {
            throw new InvalidCPFNumber($this);
        }
    }

    public function __toString(): string {
        return $this->number;
    }


}