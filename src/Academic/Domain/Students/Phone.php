<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Exceptions\InvalidPhoneNumber;

class Phone implements \Stringable {

    private string $ddd;
    private string $number;

    public function __construct(string $ddd, string $number) {
        $this->ddd = $ddd;
        $this->number = $number;
        $this->validate();
    }

    private function validate() {
        $fullNumber = "{$this->ddd} {$this->number}";

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
            throw new InvalidPhoneNumber($this);
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