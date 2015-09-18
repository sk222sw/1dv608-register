<?php

class LoginModel {
    
    private $isLoggedIn = false;
    private $storedUserName = 'a';
    private $storedPassword = 'p';
    
    public function testLogin($user) {
        if ($user->getUserName() === $this->storedUserName &&
            $user->getPassword() === $this->storedPassword) {
            return true;
        } else {
            throw new \Exception('Wrong username is password');
        }
        return false;    
    }
}