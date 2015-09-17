<?php

class LoginController {
    
    private $view;
    private $model;
    
    public function __construct($view) {
        $this->view = $view;
    }
    
    public function doLogin() {
        if ($this->view->didUserPressLogin()) {
            
            $userName = $this->view->getUserName();            
            $password = $this->view->getPassword();
            
            $user = new \model\User('hej', 'Password');
            

        }
    }
    
    
}