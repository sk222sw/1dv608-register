<?php

namespace controller;

class LoginController {
    
    private $view;
    private $model;
    private $sessionTool;
    
    public function __construct($view, $loginModel, $sessionTool) {
        $this->view = $view;
        $this->loginModel = $loginModel;
        $this->sessionTool = $sessionTool;
    }

    /*
    * does the logic for controlling loging in/out   
    * return bool
    */
    public function startLogin() {
        //check if user is already logged in and did not press logout
        if ($this->loginModel->isUserLoggedIn()) {
            if ($this->view->didUserPressLogout()) {
                $this->doLogout();
                return false;
            }
            return true;
        }
        else if ($this->view->didUserPressLogin()) {
            return $this->doLogin(); // bool
        }

    }
    
    /*
    * creates a new $user from user input
    * compares it with stored users
    * return bool
    */
    public function doLogin() {
        try {
            $userName = $this->view->getUserName();            
            $password = $this->view->getPassword();

            $user = new \model\User($userName, $password, $this->sessionTool);
            // if (!$user->validUserCredentials()) {
            //     return false;
            // }
            
            if ($this->loginModel->authenticate($user)) {
                $this->loginModel->loginUser();
                return true;
            }

        } catch (Exception $e) {
            $this->view->setMessage($e->getMessage());
        }
        return false;
    }

    /*
    * logs out user in the model
    */
    public function doLogout(){
        $this->loginModel->logoutUser();
    }

}