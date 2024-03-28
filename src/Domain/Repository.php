<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain;

/**
 * @template T
*/
interface Repository {

    /**
     * @return T[]
    */

    public function get(): array;

    public function add(T $entity): void;

    public function update(T $entity): void;

    public function remove(T $entity): void;

}