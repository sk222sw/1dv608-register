<?php

class RegisterController {
    
    private $view;
    private $model;
    private $userDAL;
    
    public function __construct(RegisterView $rw, model\UserDAL $ud) {
        $this->view = $rw;
        $this->userDAL = $ud;
    }
    

    public function userPressedRegisterButton() {
        if ($this->view->userPressedRegisterButton()) {
            echo 'user pressed register';
            if ($this->view->isUserValid()) {
                echo 'is valid user';
                $user = $this->view->getUser();
                var_dump($user);
                $this->userDAL->createUser($user);
            } else {
                echo 'is not valid user';
            }
            
            
            try {
                
            } catch (Exception $e) {
            
                //använd try-catch och om nåt går fel så set error message 
                // beroende på vad det är för fel
                $this->view->setErrorMessage();
                
            }
            
            
        }
    }
    
}