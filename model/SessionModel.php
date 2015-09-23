<?php

namespace model;

class SessionModel {
    
    private $sessionValue = false;
    private static $sessionName = 'loggedIn';
    private static $sessionMessage = 'hej';
    
    public function __construct() {
        
    }
    
    public function setSessionValue($value) {
        $_SESSION[self::$sessionName] = $value;
    }
    
    public function getSessionValue() {
        return $this->sessionValue;
    }
    
    public function setSessionMessage() {
        
    }
    
    
    
}