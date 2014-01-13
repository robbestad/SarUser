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

class SecureHash
{

    private $rounds;

    public function __construct($rounds=12)
    {
        if (CRYPT_BLOWFISH != 1) {
            throw new Exception("Bcrypt is not supported. Please upgrade your installation.");
        }

        $this->rounds = $rounds;
    }

    /**
     * createSalt function.
     * Creates a random salt for the encryption
     * @access private
     * @return string
     */
    private function createSalt()
    {
        //This config will run blowfish for 16 rounds
        $pre = '$2a$'.$this->rounds.'$';
        $end = '$';
        $salt = "";
        $bcryptBaseChars ='./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$';

        for ($i=0; $i<22; $i++) {
            $salt .= $bcryptBaseChars[mt_rand(0,strlen($bcryptBaseChars)-1)];
        }

        $this->salt=$pre . $salt.'$';

        return $this->salt;
    }

    /**
     * createHash function.
     * Create hash on supplied input and salt. Can be used to create new hash or verify existing
     * @access private
     * @param  mixed  $input
     * @param  mixed  $salt
     * @return string
     */
    private function createHash($input,$salt)
    {
        return $this->hash = crypt($input, $salt);
    }

    /**
     * returnHash function.
     * Will return a string with a hashed password. Will throw error if submitted
     * password is too short.
     * @access public
     * @param  mixed  $input
     * @return string
     */
    public function returnHash($input)
    {
        if(strlen($input)<3)
            throw new Exception("Submitted password is too short.");

        return( $this->CreateHash($input,$this->CreateSalt()));
    }

    /**
     * verifyHash function.
     * Checks submitted password against hash. Will return true if it's a match
     * @access public
     * @param  mixed $input
     * @param  mixed $hash
     * @return bool
     */
    public function verifyHash($input,$hash)
    {
        $checkHash=$this->CreateHash($input,$hash);

        return $hash === $checkHash;
    }
}
