<?php

class LoginController {
    
    private $view;
    private $model;
    
    public function __construct($view, $loginModel, $sessionModel) {
        $this->view = $view;
        $this->loginModel = $loginModel;
        $this->sessionModel = $sessionModel;
    }

    public function startLoginStuff() {

        if (!$this->view->didUserPressLogin() && !$this->view->didUserPressLogout()) {
            if ($this->loginModel->isUserLoggedIn()) {
                return true;
            }
        } else if($this->view->didUserPressLogin()) {
            return $this->doLogin();
        } 
        else if ($this->loginModel->isUserLoggedIn()) {
            $this->doLogout();
        }
        // $this->view->setLogoutMessage();
        return false;
    }
    
    public function doLogin() {
            try {
                $userName = $this->view->getUserName();            
                $password = $this->view->getPassword();
                $user = new \model\User($userName, $password);
                
                if ($this->loginModel->testLogin($user)) {
                    $this->sessionModel->setSessionValue(true);
                    return true;
                }

            } catch (Exception $e) {
                $this->view->setMessage($e->getMessage());
            }
            return false;
    }

    public function doLogout(){
        // $this->view->setLogoutMessage();
        // return false;        
    }

}