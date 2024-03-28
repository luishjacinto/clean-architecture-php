<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain;

class CPF implements \Stringable {

    private string $number;

    public function __construct(string $number) {
        $this->validateFormat($number);
        $this->validateNumber($number);
        $this->number = $number;
    }

    private function validateFormat(string $number) {
        $numberInvalid = filter_var(
            $number,
            FILTER_VALIDATE_REGEXP,
            [
                "options" => [
                    "regexp" => "/\d{3}\.\d{3}\.\d{3}\-\d{2}/"
                ]
            ]
        ) === false;

        if ($numberInvalid) {
            throw new \InvalidArgumentException(
                "Número de CPF '{$number}' com formato inválido"
            );
        }
    }

    private function validateNumber(string $formattedNumber) {
        $number = preg_replace('/[^0-9]/', '', $formattedNumber);

        for ($i = 0; $i < 10; $i++) {
            if (preg_match('/^' . $i . '{11}$/', $number)) {
                throw new \InvalidArgumentException(
                    "Número de CPF '{$formattedNumber}' inválido"
                );
            }
        }

        $sum = 0;

        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $sum += $number[$i] * $j;
        }

        $remainder = $sum % 11;

        if ($remainder == 0 || $remainder == 1) {
            $digit1 = 0;
        } else {
            $digit1 = 11 - $remainder;
        }

        if ($digit1 != $number[9]) {
            throw new \InvalidArgumentException(
                "Número de CPF '{$formattedNumber}' inválido"
            );
        }
    }

    public function __toString(): string {
        return $this->number;
    }


}