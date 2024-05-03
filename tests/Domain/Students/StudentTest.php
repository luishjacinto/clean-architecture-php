<?php

namespace Tests\Domain\Students;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Email;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Phone;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testStudentConstructor()
    {
        $cpfNumber = '992.053.280-06';
        $emailAddress = 'test@example.com';
        $name = 'Test Student';
        $phoneDDD = '53';
        $phoneNumber = '99999-9999';

        $phone = new Phone($phoneDDD, $phoneNumber);

        $student = new Student(
            new CPF($cpfNumber),
            new Email($emailAddress),
            $name
        );

        $student->addPhone($phoneDDD, $phoneNumber);

        $this->assertInstanceOf(Student::class, $student);
        $this->assertEquals($cpfNumber, (string) $student->getCPF());
        $this->assertEquals($emailAddress, (string) $student->getEmail());
        $this->assertEquals($name, $student->getName());
        $this->assertEquals([$phone], $student->getPhones());
    }

    public function testStudentBuild()
    {
        $cpfNumber = '992.053.280-06';
        $emailAddress = 'test@example.com';
        $name = 'Test Student';
        $phoneDDD = '53';
        $phoneNumber = '99999-9999';

        $phone = new Phone($phoneDDD, $phoneNumber);

        $student = Student::build($cpfNumber, $emailAddress, $name);

        $student->addPhone($phoneDDD, $phoneNumber);

        $this->assertInstanceOf(Student::class, $student);
        $this->assertEquals($cpfNumber, (string) $student->getCPF());
        $this->assertEquals($emailAddress, (string) $student->getEmail());
        $this->assertEquals($name, $student->getName());
        $this->assertEquals([$phone], $student->getPhones());
    }

}
