<?php

namespace Tests\Domain\Students;

use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase {

    public function testPhoneInvalidDDD() {
        $this->expectException(\InvalidArgumentException::class);
        new Phone('Invalid Format', '99999-9999');
    }

    public function testPhoneInvalidNumber() {
        $this->expectException(\InvalidArgumentException::class);
        new Phone('53', 'Invalid Format');
    }

    public function testPhone9DigitsNumberInvalid() {
        $this->expectException(\InvalidArgumentException::class);
        new Phone('53', '89999-9999');
    }

    public function testPhone9DigitsNumberValid() {
        $ddd = '53';
        $number = '99999-9999';
        $fullNumber = "({$ddd}) {$number}";

        $phone = new Phone($ddd, $number);

        $this->assertSame((string) $phone, $fullNumber);
    }

    public function testPhone8DigitsNumberValid() {
        $ddd = '53';
        $number = '9999-9999';
        $fullNumber = "({$ddd}) {$number}";

        $phone = new Phone($ddd, $number);

        $this->assertSame((string) $phone, $fullNumber);
    }



}