<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain\Students;

class Phone implements \Stringable {

    private string $ddd;
    private string $number;

    public function __construct(string $ddd, string $number) {
        $this->validate($ddd, $number);
        $this->ddd = $ddd;
        $this->number = $number;
    }

    private function validate(string $ddd, string $number) {
        $fullNumber = "{$ddd} {$number}";

        $fullNumberInvalid = filter_var(
            $fullNumber,
            FILTER_VALIDATE_REGEXP,
            [
                "options" => [
                    "regexp" => "/\d{2}\ ?9?\d{4}\-\d{4}/"
                ]
            ]
        ) === false;

        if ($fullNumberInvalid) {
            throw new \InvalidArgumentException(
                "Número de Telefone '{$fullNumber}' inválido"
            );
        }
    }

    public function getDDD() {
        return $this->ddd;
    }

    public function getNumber() {
        return $this->number;
    }

    public function __toString(): string {
        return "({$this->ddd}) {$this->number}";
    }


}