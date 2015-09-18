<?php

namespace model;

class User {
    
    private $userName;
    private $password;
    
    public function __construct($userName, $password) {

        if (strlen($userName) == 0) {
            throw new \Exception('Username is missing');
        }
        
        if (strlen($password) == 0) {
            throw new \Exception('Password is missing');
        }
        
        $this->userName = $userName;
        $this->password = $password;
    }
    
    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }
    
}