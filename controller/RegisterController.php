<?php

class RegisterController {
    
    private $view;
    private $model;
    
    public function __construct($view) {
        $this->view = $view;
    }
    
    public function doRegistration() {
        $this->view->testFunction();
    }
    
    public function didUserPressRegister() {
        if (isset($_GET['register'])) {
            return true;
        }
        return false;
    }
    
}