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
    
}