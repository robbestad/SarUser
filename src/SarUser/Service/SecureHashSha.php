<?php
/**
 * @author Sven Anders Robbestad @ 2013-2014 (svenanders@robbestad.com)
 *
 * @license   Creative Commons (CC BY)
 *
 *  @description SecureHash creates a hash based on blowfish.
 *
 */
namespace SarUser\Service;

class SecureHashSha
{
    private function createSalt()
    {
        # Create random hash based on the current time in microseconds
        # 'true' adds additional entropy (using the combined linear congruential generator)

        return $this->salt = uniqid(rand(), true);
    }

    public function returnHash($input)
    {
        # Checks if submitted var is longer than 3 chars
        if (strlen($input) < 3)
            return false;

        # Will return an array with a hashed password and the salt it used

        return (array($this->CreateSalt(), $this->CreateHash($input, $this->salt)));
    }

    public function verifyHash($input, $hash, $salt)
    {
        $checkHash = $this->CreateHash($input, $salt);
        if ($checkHash == $hash)
            return true;
        else
            return false;
    }

    private function createHash($input, $salt)
    {
        # Create hash on supplied input and salt. Can be used to create new hash
        # or verify existing

        return $this->hash = hash("sha256", $input . $salt); //function "hash" req. php v5.1.2 or better
    }
}
