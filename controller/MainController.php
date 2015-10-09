<?php

namespace controller;

require_once('view/NavigationView.php');


class MainController {

    public function __construct() {
        $this->view = new \view\NavigationView();
    }

    public function userPressedRegisterLink() {
        return $this->view->userWantsToRegister();
    }
    
}