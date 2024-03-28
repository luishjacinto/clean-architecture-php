<?php

namespace Tests;

use Luishjacinto\CleanArchitecturePhp\Phone;
use Luishjacinto\CleanArchitecturePhp\Student;
use Luishjacinto\CleanArchitecturePhp\StudentBuilder;
use PHPUnit\Framework\TestCase;

class StudentBuilderTest extends TestCase
{
    public function testBuildStudent()
    {
        $cpfNumber = '992.053.280-06';
        $emailAddress = 'test@example.com';
        $name = 'Test Student';
        $phoneDDD = '53';
        $phoneNumber = '99999-9999';

        $phone = new Phone($phoneDDD, $phoneNumber);

        $student =
            StudentBuilder::new($cpfNumber, $emailAddress, $name)
                ->addPhone($phoneDDD, $phoneNumber)
                ->build();

        $this->assertInstanceOf(Student::class, $student);
        $this->assertEquals($cpfNumber, (string) $student->getCPF());
        $this->assertEquals($emailAddress, (string) $student->getEmail());
        $this->assertEquals($name, $student->getName());
        $this->assertEquals([$phone], $student->getPhones());
    }

}
