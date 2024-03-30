<?php

namespace Tests\Application\Students;
use Luishjacinto\CleanArchitecturePhp\Application\Students\EnrollStudent;
use Luishjacinto\CleanArchitecturePhp\Application\Students\EnrollStudentDto;
use Luishjacinto\CleanArchitecturePhp\Domain\CPF;
use Luishjacinto\CleanArchitecturePhp\Infrastructure\Students\RepositoryInMemory;
use PHPUnit\Framework\TestCase;

class EnrollStudentTest extends TestCase {

    public function testStudentShouldHaveBeenAddedToRepository() {
        $cpfNumber = '992.053.280-06';
        $emailAddress = 'test@example.com';
        $name = 'Test Student';

        $dto = new EnrollStudentDto($cpfNumber, $emailAddress, $name);

        $repository = new RepositoryInMemory();

        EnrollStudent::enroll($dto, $repository);

        $student = $repository->getByCPF(new CPF($cpfNumber));
        $this->assertSame($name,  $student->getName());
        $this->assertSame($emailAddress, (string) $student->getEmail());
        $this->assertEmpty($student->getPhones());
    }

}