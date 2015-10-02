<?php

class RegisterView {
    
    private static $userName = 'RegisterView::UserName';
    private static $password = 'RegisterView::Password';
    private static $passwordRepeat = 'RegisterView::PasswordRepeat';
    private static $register = 'RegisterView::Register';
    private static $message = 'RegisterView::Message'; 
	private static $messageId = 'RegisterView::Message';    
    
    public function testFunction () {
        echo '<h2>REGISTER AMIGO!</h2>';
    }
    
    public function generateRegisterFormHTML($pressedRegister) {
        $message = '';
        
        if ($pressedRegister) {
            return '
                <h2>Register a new user</h2>
                <form method="post">
                    <fieldset>
                        <legend>Register a new user - Write username and password</legend>
                    	<p id="' . self::$messageId . '">' . $message . '</p>    
                        <div>
                            <label for"' . self::$userName . '">Username : </label>
                            <input type="text" id="' . self::$userName . '" name="' . self::$userName . '" />
                        </div>
                        
                        <div>
                            <label for"' . self::$password . '">Password : </label>
                            <input type="password" id="' . self::$password . '" name="' . self::$password . '" />
                        </div>
                        
                        <div>
                            <label for"' . self::$passwordRepeat . '">Repeat password : </label>
                            <input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />                   
                        </div>
                    
                        <input type="submit" name"'. self::$register . '" value="register" />
                    </fieldset>
                </form>
            ';        
        }
    }
    
}