<?php

namespace model;

class RegisterModel {
    private $user;
    
    public function __construct(\DAL\UserDAL $userDAL) {
        $this->dal = $userDAL;
        // $this->user = $userDAL->getUsers(); ??
    }
}