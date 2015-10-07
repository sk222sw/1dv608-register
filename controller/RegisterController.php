<?php

class RegisterController {
    
    private $view;
    private $model;
    
    public function __construct($view) {
        $this->view = $view;
    }
    
    public function doRegistration() {
        
    }
    
    public function didUserPressRegisterButton() {
        if ($this->view->didUserPressRegisterButton()) {
            try {
                
            } catch (Exception $e) {
            
                //använd try-catch och om nåt går fel så set error message 
                // beroende på vad det är för fel
                $this->view->setErrorMessage();
                
            }
            
            
        }
    }
    
}