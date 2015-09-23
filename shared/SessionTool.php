<?php

namespace shared;

class SessionTool {
    
    public function __construct(){
        session_start();
    }
    
    //set session
    public function setLoginSession($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public function getLoginSession($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
    
    //unset session
    public function unsetSession($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    
    public function setFlashMessage($id) {
        $_SESSION['flashMessage'] = $id;
    }
    
    public function getFlashMessage(){
        return $_SESSION['flashMessage'];
    }
    
}