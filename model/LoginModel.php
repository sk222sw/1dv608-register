<?php

namespace model;

class LoginModel {
    
    //these are my simple fake database response credentials
    private static $isLoggedIn = false;
    private $storedUserName = 'a';
    private $storedPassword = 'p';
    private static $storedUserId = 'user1';
    
    private $session;
    
    public function __construct(\shared\SessionTool $session) {
        $this->session = $session;
    }
    
    public function testLogin($user) {
        if ($user->getUserName() === $this->storedUserName && 
            $user->getPassword() === $this->storedPassword) {
            
            return true;
        } else {
            throw new \Exception('Wrong name or password');
        }
        return false;    
    }
    
    public function loginUser() {
        self::$isLoggedIn = true;
        $this->session->setLoginSession(self::$storedUserId, self::$isLoggedIn);
    }
    
    public function isUserLoggedIn() {
        self::$isLoggedIn = $this->session->getLoginSession(self::$storedUserId);
        return self::$isLoggedIn;
    }
    
    public function logoutUser() {
        $_SESSION['loggedIn'] = false;
    }
    
    
    
}