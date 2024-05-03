<?php

namespace Luishjacinto\CleanArchitecturePhp\Gamification\Infrastructure\Labels;

use Luishjacinto\CleanArchitecturePhp\Lib\Domain\CPFs\CPF;
use Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels\Label;
use Luishjacinto\CleanArchitecturePhp\Gamification\Domain\Labels;

/**
 * @implements Labels\Repository
*/
class RepositoryInMemory implements Labels\Repository {

    /**
     * @var Label[] $labels;
    */
    private array $labels = [];

    /**
     * @param Label[] $label
    */

    public function get(): array {
        return $this->labels;
    }

    /**
     * @param Label $label
    */

    public function add($label): void {
        $this->labels[] = $label;
    }

    public function getByStudentCPF(CPF $cpf): array {
        return array_filter($this->labels, fn (Label $label) => $label->studentCPF() == $cpf);
    }

    /**
     * @param Label $label
    */

    public function update($label): void {
        throw new \DomainException('Not implemented yet');
    }

    /**
     * @param Label $label
    */

    public function remove($label): void {
        throw new \DomainException('Not implemented yet');
    }


}