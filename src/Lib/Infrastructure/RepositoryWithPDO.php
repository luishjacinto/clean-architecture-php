<?php

namespace Luishjacinto\CleanArchitecturePhp\Lib\Infrastructure;

abstract class RepositoryWithPDO {

    protected \PDO $connection;

    public function __construct(\PDO $connection) {
        $this->connection = $connection;
    }

}