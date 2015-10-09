<?php

class RegisterController {
    
    private $view;
    private $model;
    private $userDAL;
    
    public function __construct(RegisterView $rw, model\UserDAL $ud) {
        $this->view = $rw;
        $this->userDAL = $ud;
    }
    

    public function doRegistration() {
        if ($this->view->userPressedRegisterButton()) {
            
            $userList = $this->userDAL->getAllUsers();

            if ($this->view->isUserValid($userList)) {
                $user = $this->view->getUser();
                $this->userDAL->createUser($user);
                $this->view->registerRedirect();
                return true;
            } else {
                return false;
            }
        }
    }
    
}