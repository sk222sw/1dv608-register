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
        if (strlen($user->getUserName()) == 0) {
            echo 'hej';
        }
        
        
            if ($user->getUserName() === $this->storedUserName && 
                $user->getPassword() === $this->storedPassword) {
                
                return true;
            } else {
                $this->session->setFlashMessage(3);
                throw new \Exception('Wrong name or password');
            }
            return false;    
    }
    
    public function loginUser() {
        self::$isLoggedIn = true;
        $this->session->setLoginSession(self::$storedUserId, self::$isLoggedIn);
        $this->session->setFlashMessage(1);
    }
    
    public function isUserLoggedIn() {
        self::$isLoggedIn = $this->session->getLoginSession(self::$storedUserId);
        unset($_SESSION['flashMessage']);
        return self::$isLoggedIn;
    }
    
    public function logoutUser() {
        $this->session->unsetSession(self::$storedUserId);
        $this->session->setFlashMessage(2);
        self::$isLoggedIn = false;
        return self::$isLoggedIn;
    }
    
}