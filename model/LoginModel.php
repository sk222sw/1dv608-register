<?php

class LoginModel {
    
    private $isLoggedIn = false;
    private $storedUserName = 'a';
    private $storedPassword = 'p';
    
    public function testLogin($user) {
        return  $user->getUserName() === $this->storedUserName &&
                $user->getPassword() === $this->storedPassword;
    }
    
    public function testUserName($user) {
        return $user->getUserName() != '';
    }
    
    public function testPassword($user) {
        return $user->getPassword() != '';
    }
    
}