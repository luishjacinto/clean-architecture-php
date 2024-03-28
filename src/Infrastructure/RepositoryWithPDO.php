<?php

namespace Luishjacinto\CleanArchitecturePhp\Infrastructure;

abstract class RepositoryWithPDO {

    protected \PDO $connection;

    public function __construct(\PDO $connection) {
        $this->connection = $connection;
    }

}