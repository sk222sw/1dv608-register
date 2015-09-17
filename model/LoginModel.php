<?php

class LoginModel {
    
    private $isLoggedIn = false;
    private $storedUserName = 'Admin';
    private $storedPassword = 'Password';
    
    public function testLogin($user) {
        if ($user->getUserName() === $this->storedUserName) {
            return true;
        }
        return false;
    }
}