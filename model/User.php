<?php

namespace model;

class User {
    
    private $userName;
    private $password;
    private $session;
    
    public function __construct($userName, $password, $session) {
        $this->session = $session;

        // if (trim($userName) == '') {
        //     $this->flash(3);
        //     // throw new \Exception('Username is missing');
        // }
        // if (trim($password) == '') {
        //     $this->flash(4);
        //     // throw new \Exception('Password is missing');
        // }
        
        $this->userName = $userName;
        $this->password = $password;
    }
    
    /*
    * set error id to new flashmessage
    * no return
    */
    private function flash($id) {
        if (isset($id)) {
            $this->session->setFlashMessage($id);
        }
    }
    
    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function isUserNameUnique($users) {
        foreach ($users as $user) {
            if($user == $this->userName) {
                return false;
            }
        }
        return true;
    }
    
    public function validUserCredentials() {
        if (trim($this->userName) === '') {
            $this->flash(3);
            return false;
        }
        if (trim($this->password) === '') {
            $this->flash(4);
        }        
    }
    
}