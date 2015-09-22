<?php

class LoginController {
    
    private $view;
    private $model;
    
    public function __construct($view, $loginModel) {
        $this->view = $view;
        $this->loginModel = $loginModel;
    }

    public function startLoginStuff() {

        if (!$this->view->didUserPressLogin() && !$this->view->didUserPressLogout()) {
            if ($this->loginModel->isUserLoggedIn()) {
                return true;
            }
        } else {
            return $this->doLogin();
        } return false;
        
    }
    
    public function doLogin() {
            try {
                $userName = $this->view->getUserName();            
                $password = $this->view->getPassword();
                $user = new \model\User($userName, $password);
                
                if ($this->loginModel->testLogin($user) == true) {
                    $_SESSION['loggedIn'] = true;
                    return true;
                }

            } catch (Exception $e) {
                $this->view->setMessage($e->getMessage());
            }
            return false;
    }

    public function doLogout(){
        return false;        
    }

}