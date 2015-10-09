<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('model/LoginModel.php');
require_once('model/User.php');
require_once("model/DAL/UserDAL.php");
require_once('shared/SessionTool.php');
require_once('controller/MainController.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//Session helper class
$sessionTool = new shared\SessionTool();
$userDAL = new model\UserDAL($sessionTool);
$loginModel = new model\LoginModel($sessionTool, $userDAL);

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView($loginModel);
$dtv = new DateTimeView();
$lv = new LayoutView();
$regView = new RegisterView();

//CREATE CONTROLLER OBJECTS
$loginController = new LoginController($v, $loginModel, $sessionTool);
$registerController = new RegisterController($regView, $userDAL);
$mainController = new controller\MainController();

$pressedRegisterLink = $mainController->userPressedRegisterLink();

$isLoggedIn = $loginController->startLogin();
$didRegisterSucceed = $registerController->doRegistration();

$lv->render($isLoggedIn, $pressedRegisterLink, $didRegisterSucceed, $v, $regView, $dtv);