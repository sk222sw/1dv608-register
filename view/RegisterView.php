<?php

use model\User;

class RegisterView {
    
    private static $userName = 'RegisterView::UserName';
    private static $password = 'RegisterView::Password';
    private static $passwordRepeat = 'RegisterView::PasswordRepeat';
    private static $register = 'RegisterView::Register';
    private static $message = ''; 
	private static $messageId = 'RegisterView::Message';    
    
    public function response($pressedRegister) {
        if ($pressedRegister) {
            
        }
        
        return $this->generateRegisterFormHTML();
    }
    
    private function generateRegisterFormHTML() {
            return "
            <h2>Register new user</h2>
			<form action='?register=1' method='post' enctype='multipart/form-data'>
				<fieldset>
				<legend>Register a new user - Write username and password</legend>
				
					<p id='" . self::$messageId . "'>" . self::$message . "</p>
					
					<label for='" . self::$userName . "' >Username :</label>
					<input type='text' size='20' name='" . self::$userName . "' id='" . self::$userName . "' value='' />
					<br/>
					
					<label for='" . self::$password . "' >Password  :</label>
					<input type='password' size='20' name='" . self::$password . "' id='" . self::$password . "' value='' />
					<br/>
					<label for='" . self::$passwordRepeat . "' >Repeat password  :</label>
					<input type='password' size='20' name='" . self::$passwordRepeat . "' id='" . self::$passwordRepeat . "' value='' />
					<br/>
					<input id='submit' type='submit' name='DoRegistration'  value='Register' />
					<br/>
				</fieldset>
            ";        
    }
    
    public function didUserPressRegisterButton() {
        if (isset($_POST['DoRegistration'])) {
            
            if (strlen($_POST[self::$userName]) < 3) {
                self::$message .= 'Username has too few characters, at least 3 characters.<br />';
            }
            if (strlen($_POST[self::$userName]) < 6) {
                self::$message .= 'Password has too few characters, at least 6 characters.<br />';
            }
            if ($_POST[self::$password] != $_POST[self::$passwordRepeat]) {
                self::$message = 'Passwords do not match.';
            }            
            
            if ($_POST[self::$userName] != '')
                echo $this->createTempUser()->getUserName();
        }
    }
    
    public function createTempUser() {
        $enteredUserName = $this->getUserName();
        
        return $user = new model\User($enteredUserName, 'temppass', "temp");
    }
    
    private function getUserName() {
        if (isset($_POST[self::$userName]))
            return $_POST[self::$userName];
    }
    // private function getPassword() {
    //     if (isset($_POST[self::$password]))
    //         return $_POST[self::$password];
    // }
    // private function getPasswordRepeat() {
    //     if (isset($_POST[self::$passwordRepeat]))
    //         return $_POST[self::$passwordRepeat];
    // }
    
}