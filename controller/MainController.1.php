<?php

namespace controller;

require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('view/NavigationView.php');


class MainController {
    
    private $loginController;
    private $registerController;
    private $navigationView;
    
    // public function __construct() {
    //     $this->navigationView = new \view\NavigationView();
    // }
    
    // public function handleApp() {
    //     if ($this->navigationView->userWantsToRegister()) {
    //         $register = new \RegisterController();
    //         $register->doRegistration();
    //     }
    //     else {
    //         $login = new \LoginController();
    //     }
    //     // if is in login
        
    //     // else if is in register

    // }
    
    // public function generateOutput() {
    //     return $this->view;
    // }
    
}