<?php

namespace model;

class User {
    
    private $userName;
    private $password;
    private $session;
    
    public function __construct($userName, $password, $session) {
        $this->session = $session;

        if (trim($userName) === '') {
            $this->flash(4);
            throw new \Exception('Username is missing');
        }
        if (trim($password) === '') {
            $this->flash(5);
            throw new \Exception('Password is missing');
        }
        
        $this->userName = $userName;
        $this->password = $password;
    }
    
    private function flash($id) {
        $this->session->setFlashMessage($id);
    }
    
    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }
    
}