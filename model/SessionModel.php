<?php

namespace model;

class SessionModel {
    
    private $sessionValue = false;
    private static $sessionName = 'loggedIn';
    
    public function __construct() {
        
    }
    
    public function setSessionValue($value) {
        $_SESSION[self::$sessionName] = $value;
    }
    
    public function getSessionValue() {
        return $this->sessionValue;
    }
    
}