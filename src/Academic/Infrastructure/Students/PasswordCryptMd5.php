<?php

namespace Luishjacinto\CleanArchitecturePhp\Academic\Infrastructure\Students;
use Luishjacinto\CleanArchitecturePhp\Academic\Domain\Students\PasswordCrypt;

class PasswordCryptMd5 implements PasswordCrypt {

    public function crypt(string $password): string {
        return md5($password);
    }
    public function verify(string $password, string $crypted_password): bool {
        return $this->crypt($password) === $crypted_password;
    }

}