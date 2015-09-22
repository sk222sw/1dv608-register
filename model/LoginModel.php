<?php

namespace model;

class LoginModel {
    
    private $isLoggedIn = false;
    private $storedUserName = 'a';
    private $storedPassword = 'p';
    private $session;
    
    // public function __construct(\model\SessionModel $session) {
    //     $this->session = $session;
    // }
    
    public function testLogin($user) {
        if ($user->getUserName() === $this->storedUserName && 
            $user->getPassword() === $this->storedPassword) {
            
            return true;
        } else {
            throw new \Exception('Wrong name or password');
        }
        return false;    
    }
    
    public function isUserLoggedIn() {
        if (isset($_SESSION['loggedIn'])) {
            return $_SESSION['loggedIn'];
        }
    }
    
    public function logoutUser() {
        $_SESSION['loggedIn'] = false;
    }
    
}