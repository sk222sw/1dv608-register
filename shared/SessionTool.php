<?php

namespace shared;

class SessionTool {
    
    public function __construct(){

    }
    
    //set session
    public function setLoginSession($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public function getLoginSession($key) {
        return $_SESSION[$key];
    }
    
    //unset session
    public function unsetSession($key) {
        unset($_SESSION[$key]);
    }
    
    
}