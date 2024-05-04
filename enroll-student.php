<?php
require './vendor/autoload.php';

use Luishjacinto\CleanArchitecturePhp\Academic;
use Luishjacinto\CleanArchitecturePhp\Gamification\Application\Labels\GetLabelsByCPFDto;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\EventPublisher;
use Luishjacinto\CleanArchitecturePhp\Academic\Infrastructure;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\Events\LogEnrolledStudent;
use Luishjacinto\CleanArchitecturePhp\Gamification;
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// php enroll-student.php '992.053.280-06' 'test1@example.com' 'Luis' '053' '90005-9999'

$cpfNumber = $argv[1];
$emailAddress = $argv[2];
$name = $argv[3];
$phoneDDD = $argv[4];
$phoneNumber = $argv[5];

$enrollStudentDto = new Academic\Application\Students\EnrollStudentDto($cpfNumber, $emailAddress, $name);
$addPhoneDto = new Academic\Application\Students\AddPhoneDto($cpfNumber, $phoneDDD, $phoneNumber);

$studentRepository = new Infrastructure\Students\RepositoryInMemory();
$labelRepository = new Gamification\Infrastructure\Labels\RepositoryInMemory();


$eventPublisher = new EventPublisher;
$eventPublisher
    ->addListener(new LogEnrolledStudent)
    ->addListener(new Gamification\Application\Labels\GenerateNewbieLabel($labelRepository));

Academic\Application\Students\EnrollStudent::enroll($enrollStudentDto, $studentRepository, $eventPublisher);
Academic\Application\Students\AddPhone::add($addPhoneDto, $studentRepository);

$cpf = new CPF($cpfNumber);
$getLabelsByCPFDto = new GetLabelsByCPFDto($cpf);

var_dump(Gamification\Application\Labels\GetLabelsByCPF::get($getLabelsByCPFDto, $labelRepository));