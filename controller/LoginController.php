<?php

class LoginController {
    
    private $view;
    private $model;
    
    public function __construct($view, $loginModel, $sessionTool) {
        $this->view = $view;
        $this->loginModel = $loginModel;
        $this->sessionTool = $sessionTool;
    }

    public function startLoginStuff() {
    
        //check if user is already logged in and did not press logout
        if ($this->loginModel->isUserLoggedIn()) {
            if ($this->view->didUserPressLogout()) {
                $this->doLogout();
                return false;
            }
            return true;
        }

        else if ($this->view->didUserPressLogin()) {
            return $this->authenticate();
        }

    }
    
    public function authenticate() {
            try {
                $userName = $this->view->getUserName();            
                $password = $this->view->getPassword();
                $user = new \model\User($userName, $password, $this->sessionTool);
                
                if ($this->loginModel->testLogin($user)) {
                    $this->loginModel->loginUser();
                    return true;
                }

            } catch (Exception $e) {
                $this->view->setMessage($e->getMessage());
            }
            return false;
    }

    public function doLogout(){
        $this->loginModel->logoutUser();
    }

}