<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private static $message = '';
	private static $enteredName = '';
	
	//flash messages:
	private static $loginMessage = 'Welcome';
	private static $logoutMessage = 'Bye bye!';
	private static $missingUserName = 'Username is missing';
	private static $missingPassword = 'Password is missing';
	private static $wrongCredentials = 'Wrong name or password';
	
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return void BUT writes to standard output and cookies!
	 */ 
	public function response($isLoggedIn) {
		if ($isLoggedIn) {
			if ($this->didUserPressLogin()) $this->setMessage(); // -> welcome
			$response = $this->generateLogoutButtonHTML(self::$message);
		} 
		else {
			$this->setMessage(); // -> bye bye 
			self::$enteredName = $this->getUserName(); //entered name survives post
			$response = $this->generateLoginFormHTML(self::$message, self::$enteredName);
		}
		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message, $enteredName) {
		return '
			<form method="post"> 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $enteredName . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	/*
	* use $_POST to check if the loginbutton was clicked
	* return bool
	*/
	public function didUserPressLogin() {
		return isset($_POST[self::$login]);
	}
	
	/*
	* use $_POST to check if the logoutbutton was clicked
	* return bool
	*/	
	public function didUserPressLogout() {
		return isset($_POST[self::$logout]);
	}
	
	/*
	* get user name from POST
	* return string
	*/		
	public function getUserName()
	{
		if (isset($_POST[self::$name])) {
			return $_POST[self::$name];
		} 
	}
	
	/*
	* get password from POST
	* return string
	*/	
	public function getPassword()
	{
		if (trim($_POST[self::$password]) !== '') {
			return $_POST[self::$password];
		}
	}
	
	/********* TODO : PRG *********
	* set header to request uri to
	* prevent resending form data
	* NOT YET IMPLEMENTED 
	*/		
	public function setHeader() {
		header("Location: " . $_SERVER['REQUEST_URI']);
		exit();
	}
	
	/*
	* get message id from SESSION
	* set $message with the recieved message id
	* return void
	*/		
	public function setMessage() {
		if (isset($_SESSION['flashMessage'])) {
			$id = $_SESSION['flashMessage'];
			switch ($id) {
				case 0:
					self::$message = '';
					break;
				case 1:
					self::$message = self::$loginMessage;
					break;
				case 2:
					self::$message = self::$logoutMessage;
					break;
				case 3:
					self::$message = self::$wrongCredentials;
					break;
				case 4:
					self::$message = self::$missingUserName;
					break;
				case 5:
					self::$message = self::$missingPassword;
					break;
				case 6:
					self::$message = "Registered new user.";
					break;
				default:
					self::$message = '';
					break;
			}
		} 
		unset($_SESSION['flashMessage']);
	}
	
}