<?php

namespace shared;

class SessionTool {
    
    private static $flashMessage = 'flashMessage';
    
    public function __construct(){
        session_start();
    }
    
    //set session
    public function setLoginSession($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    /*
    * get a session with $key
    * return the session variable
    */
    public function getLoginSession($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
    
    //unset session from specific $key
    public function unsetSession($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    
    //set flashMessage session variable
    public function setFlashMessage($id) {
        $_SESSION[self::$flashMessage] = $id;
    }
}