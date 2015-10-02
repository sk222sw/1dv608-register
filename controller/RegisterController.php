<?php

class RegisterController {
    
    private $view;
    private $model;
    
    public function __construct($view) {
        $this->view = $view;
    }
    
    public function doRegistration() {
        
    }
    
    public function didUserPressRegister() {
        if (isset($_GET['register=1'])) {
            return true;
        }
        return false;
    }
    
}