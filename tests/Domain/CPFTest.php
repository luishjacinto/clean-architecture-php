<?php

namespace Tests\Domain;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase {

    public function testCPFInvalidFormat() {
        $this->expectException(\InvalidArgumentException::class);
        new CPF('Invalid Format');
    }

    public function testCPFInvalidNumber() {
        $this->expectException(\InvalidArgumentException::class);
        new CPF('992.053.280-16');
    }

    public function testCPFValidNumber() {
        $number = '992.053.280-06';
        $cpf = new CPF($number);

        $this->assertSame((string) $cpf, $number);
    }

}