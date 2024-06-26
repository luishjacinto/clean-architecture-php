<?php

namespace Tests\Domain;

use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase {

    public function testEmailInvalidFormat() {
        $this->expectException(\InvalidArgumentException::class);
        new Email('Invalid Format');
    }

    public function testEmailValid() {
        $address = 'test@example.com';
        $email = new Email($address);

        $this->assertSame((string) $email, $address);
    }



}