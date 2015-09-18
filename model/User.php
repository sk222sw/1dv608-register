<?php

namespace model;

class User {
    
    private $userName;
    private $password;
    
    public function __construct($userName, $password) {
        // assert(is_string($userName) && strlen($userName) > 0);
        // assert(is_string($password) && strlen($password) > 0);

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