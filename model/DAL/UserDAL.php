<?php

namespace model;

class UserDAL {
    
    private $users;
    private $savePath;
    
    public function __construct() {
        $this->users = array();
        $this->savePath = "data/users.txt";
    }
    
    public function createUser($user) {
        $userFile = file_get_contents($this->savePath);
        $userFile .= $user->getUserName() . "\n";
        file_put_contents($this->savePath, $userFile);
    }
    
    public function getUserList() {
        return $this->users;
    }
    
}