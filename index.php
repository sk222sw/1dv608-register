<?php
session_start();
//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('controller/LoginController.php');
require_once('model/LoginModel.php');
require_once('model/User.php');
require_once('shared/SessionTool.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE MODEL OBJECTS
$sessionTool = new shared\SessionTool();
$loginModel = new model\LoginModel($sessionTool);

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView($loginModel);
$dtv = new DateTimeView();
$lv = new LayoutView();

//CREATE CONTROLLER OBJECTS
$loginController = new LoginController($v, $loginModel, $sessionTool);

$isLoggedIn = $loginController->startLoginStuff();

$lv->render($isLoggedIn, $v, $dtv);