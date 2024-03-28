<?php
require './vendor/autoload.php';

use Luishjacinto\CleanArchitecturePhp\Domain\Students\Student;
use Luishjacinto\CleanArchitecturePhp\Infrastructure;


$pdo = new \PDO('sqlite:db/db.sqlite');

$repo = new Infrastructure\Students\RepositoryWithPDO($pdo);
$student1 = Student::build('992.053.280-06', 'test1@example.com', 'Luis');
$student1->addPhone('53', '90001-9999');

$student2 = Student::build('399.561.590-26', 'test2@example.com', 'Carlos');
$student2->addPhone('53', '90002-9999');

$students = $repo->get();

foreach ($students as $student) {
    $repo->remove($student);
}

$repo->add($student1);
$repo->add($student2);

var_dump($repo->get());

$student2->addPhone('53', '90003-9999');
$repo->update($student2);

var_dump($repo->getByCPF($student2->getCPF()));