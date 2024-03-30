<?php
require './vendor/autoload.php';

use Luishjacinto\CleanArchitecturePhp\Application;
use Luishjacinto\CleanArchitecturePhp\Infrastructure;

// php enroll-student.php '992.053.280-06' 'test1@example.com' 'Luis' '053' '90005-9999'

$cpfNumber = $argv[1];
$emailAddress = $argv[2];
$name = $argv[3];
$phoneDDD = $argv[4];
$phoneNumber = $argv[5];

$enrollStudentDto = new Application\Students\EnrollStudentDto($cpfNumber, $emailAddress, $name);
$addPhoneDto = new Application\Students\AddPhoneDto($cpfNumber, $phoneDDD, $phoneNumber);

$repository = new Infrastructure\Students\RepositoryInMemory();

Application\Students\EnrollStudent::enroll($enrollStudentDto, $repository);
Application\Students\AddPhone::add($addPhoneDto, $repository);

var_dump($repository->get());