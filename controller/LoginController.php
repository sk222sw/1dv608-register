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
            try {
                $userName = $this->view->getUserName();            
                $password = $this->view->getPassword();
                $user = new \model\User($userName, $password);
                
                if ($this->loginModel->testLogin($user)) {
                    
                    return true;
                } 

            } catch (Exception $e) {
                $this->view->setMessage($e->getMessage());
            }
        }
    }

}