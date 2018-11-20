<?php

namespace App\Service;

/**
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
final class CryptGenerator
{
    public function hash(string $password): string
    {
        $salt = $salt = substr(sha1((string)rand()), 0, 16);
        $hash = crypt($password, '$6$' . $salt);

        return $hash;
    }
}