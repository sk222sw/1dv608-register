<?php

namespace model;

use model;

class UserDAL {
    
    private $session;
    private $users;
    private $savePath;
    
    public function __construct($session) {
        $this->users = array();
        $this->savePath = "data/users.txt";
        $this->session = $session;
    }
    
    public function createUser($user) {
        $userFile = file_get_contents($this->savePath);
        $userFile .= $user->getUserName() . "|" . $user->getPassword() . "\n";
        file_put_contents($this->savePath, $userFile);
        $this->session->setFlashMessage(6);
    }
    
    private function makeUserObject($string) {
        if ($string !== "") {
            $explodedString = explode("|", $string);
            return new User($explodedString[0], $explodedString[1], "");
        }
    }
    
    public function getAllUsers() {
        $file = file_get_contents($this->savePath);
        $userList = explode("\n", $file);
        $userObjectList = array();
        foreach ($userList as $u) {
            $userObject = $this->makeUserObject($u);
            $userObjectList[] = $userObject;
        }
        return $userObjectList;
    }

}