<?php

namespace Luishjacinto\CleanArchitecturePhp\Domain\Students;

interface PasswordCrypt {

    public function crypt(string $password): string;
    public function verify(string $password, string $crypted_password): bool;

}