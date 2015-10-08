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
    
    public function userPressedRegisterButton() {
        return isset($_POST['DoRegistration']);
    }

    public function isUserValid() {
        $isValid = true;
        if (strlen($_POST[self::$userName]) < 3) {
            self::$message .= 'Username has too few characters, at least 3 characters.<br />';
            $isValid = false;
        }
        if (strlen($_POST[self::$password]) < 6) {
            self::$message .= 'Password has too few characters, at least 6 characters.<br />';
            $isValid = false;
        }
        if ($_POST[self::$password] != $_POST[self::$passwordRepeat]) {
            self::$message = 'Passwords do not match.';
            $isValid = false;
        }                   
        return $isValid;
    }
    
    public function getUser() {
        return new \model\User($_POST[self::$userName], $_POST[self::$password], "");
    }

    //stolen from daniels lecture. 
    //thrown from user create model
    //he fulhacked class NewExceptionBla extends \Exceptiion {}; in the top of user model 
    
    // public function getPostedUserCredentials () {
    
    //      use getPostField() instead (y)_/-.-\_\m/
    
    //     $postUserName = $_POST[self::$userName];
    //     $postPassword = $_POST[self::$password];
    //     $postPasswordRepeat = $_POST[self::$passwordRepeat];
        
    //     try {
    //         return new model\User($postUserName, $postPassword, 'null');
    //     } catch (ShortUserNameException $e) {
    //         self::$message .= 'Username has too few characters, at least 3 characters.<br />';
    //     } catch (ShortPasswordException $e) {
    //         self::$message .= 'Password has too few characters, at least 6 characters.<br />';
    //     } catch (PasswordDontMatchException $e) {
    //         self::$message .= 'Passwords do not match.';
    //     }
            // return null
    // }
    
    //stolen without guilt from daniels lecture
    
    private function getPostField($field) {
        if (isset($_POST[$field])) {
            return trim($_POST[$field]);
        }
        return "";
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