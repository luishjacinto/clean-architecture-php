<?php

namespace Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain;
use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels\Label;


/**
 * @implements Domain\Repository<Label>
*/
interface Repository extends Domain\Repository {

    /**
     * @param Label $label
    */

    public function add($label): void;

    /**
     * @return Label[]
    */

    public function getByStudentCPF(CPF $cpf): array;

    /**
     * @param Label $label
    */

    public function update($label): void;

    /**
     * @param Label $label
    */

    public function remove($label): void;


}