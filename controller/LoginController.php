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

            if (!$this->loginModel->testUserName($user)) {
                $this->view->setMessageId(1);
                return false;
            }

            else if (!$this->loginModel->testPassword($user)) {
                $this->view->setMessageId(2);
                return false;
            }

            $this->view->setMessageId(0);
            return $this->loginModel->testLogin($user);
                        
        }
    }

}