<?php
require './vendor/autoload.php';

use Luishjacinto\CleanArchitecturePhp\Application;
use Luishjacinto\CleanArchitecturePhp\Infrastructure;

// php enroll-student-pdo.php '992.053.280-06' 'test1@example.com' 'Luis' '053' '90005-9999'

$cpfNumber = $argv[1];
$emailAddress = $argv[2];
$name = $argv[3];
$phoneDDD = $argv[4];
$phoneNumber = $argv[5];

$enrollStudentDto = new Application\Students\EnrollStudentDto($cpfNumber, $emailAddress, $name);
$addPhoneDto = new Application\Students\AddPhoneDto($cpfNumber, $phoneDDD, $phoneNumber);

$pdo = new \PDO('sqlite:db/db.sqlite');

$repository = new Infrastructure\Students\RepositoryWithPDO($pdo);

Application\Students\EnrollStudent::enroll($enrollStudentDto, $repository);
Application\Students\AddPhone::add($addPhoneDto, $repository);

var_dump($repository->get());

$students = $repository->get();

foreach ($students as $s) {
    $repository->remove($s);
}