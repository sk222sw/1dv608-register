<?php

namespace controller;

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('view/NavigationView.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('model/LoginModel.php');
require_once('model/User.php');
require_once("model/DAL/UserDAL.php");
require_once('shared/SessionTool.php');

class MainController {

    public function __construct() {
    }

    public function doApp() {
        $layoutView = new \view\LayoutView();
        $sessionTool = new \shared\SessionTool();
        $userDAL = new \model\UserDAL($sessionTool);
        $loginModel = new \model\LoginModel($sessionTool, $userDAL);        
                
        $loginView = new \view\LoginView($loginModel);
        $dtv = new \view\DateTimeView();
        $layoutView = new \view\LayoutView();
        $registerView = new \view\RegisterView($sessionTool);
        $navigationView = new \view\NavigationView();
        
        $isLoggedIn = false;
        
        if ($navigationView->userWantsToRegister()) {
            $registerController = new \controller\RegisterController($registerView, $userDAL);
            
            $didRegisterSucceed = $registerController->doRegistration();
            
            $htmlContent = $registerView->response();
        }
        
        else {
            $loginController = new \controller\LoginController($loginView, $loginModel, $sessionTool);
            $isLoggedIn = $loginController->startLogin();
            $htmlContent = $loginView->response($isLoggedIn);
        }
        
        $pressedRegisterLink = $navigationView->userWantsToRegister();
        
        $layoutView->render($isLoggedIn, $htmlContent, $registerView, $dtv);    
    }
}