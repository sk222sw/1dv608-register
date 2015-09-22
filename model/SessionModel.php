<?php

namespace model;

class SessionModels {
    
    private $sessionValue;
    private $sessionName = 'loggedIn';
    
    // public function __construct() {
    //     session_start();
    // }
    
    public function createSession($isLoggedIn) {
        echo 'session craeted in session model';
        $_SESSION[$this->sessionName] = $isLoggedIn;
    }

    public function getSession() {
        if(isset($_SESSION['loggedIn'])) {
            if ($_SESSION[$this->sessionName] == true) {
                return true;            
            }
        }
        return false;
    }

    public function removeSession() {
        $_SESSION[self::$sessionName] == false;
    }

    public function existsSession($sessionName) {
        return isset($_SESSION[$sessionName]);
    }
    
}