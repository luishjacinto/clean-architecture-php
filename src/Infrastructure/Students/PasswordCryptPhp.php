<?php

namespace Luishjacinto\CleanArchitecturePhp\Infrastructure\Students;
use Luishjacinto\CleanArchitecturePhp\Domain\Students\PasswordCrypt;

class PasswordCryptPhp implements PasswordCrypt {

    public function crypt(string $password): string {
        return password_hash($password, PASSWORD_ARGON2ID);
    }
    public function verify(string $password, string $crypted_password): bool {
        return password_verify($password, $crypted_password);
    }

}