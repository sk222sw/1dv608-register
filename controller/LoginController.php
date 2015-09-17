<?php

class LoginController {
    
    private $view;
    private $model;
    
    public function __construct($view, $loginModel) {
        $this->view = $view;
        $this->loginModel = $loginModel;
    }
    
    public function doLogin() {
        if ($this->view->didUserPressLogin()) {
            
            $userName = $this->view->getUserName();            
            $password = $this->view->getPassword();
            
            $user = new \model\User($userName, $password);

            echo $this->loginModel->testLogin($user);

        }
    }
    
    
}