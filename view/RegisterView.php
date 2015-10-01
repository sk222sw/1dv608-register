<?php

class RegisterView {
    
    private static $userName = 'RegisterView::UserName';
    private static $password = 'RegisterView::Password';
    private static $passwordRepeat = 'RegisterView::PasswordRepeat';
    private static $register = 'RegisterView::Register';
    
    public function testFunction () {
        echo '<h2>REGISTER AMIGO!</h2>';
    }
    
    private function generateRegisterFormHTML() {
        return '
            <form method="post">
                <fieldset>
                    <legend>Register a new user - Write username and password</legend>
                    
                    <label for"' . self::$userName . '">Username : </label>
                    <p id="' . self::$userName . '"></p>
                    
                    <label for"' . self::$password . '">Password : </label>
                    <p id="' . self::$password . '"></p>
                    
                    <label for"' . self::$passwordRepeat . '">Repeat password : </label>
                    <p id="' . self::$passwordRepeat . '"></p>                    
                
                    <input type="submit" name"'. self::$register . '" value="register" />
                </fieldset>
            </form>
        ';        
    }
    
}