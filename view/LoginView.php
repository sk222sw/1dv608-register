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
			if ($this->didUserPressLogin()) {
				$this->setMessage();
			}
			$response = $this->generateLogoutButtonHTML(self::$message);
		} 
		else {
			$this->setMessage();
			self::$enteredName = $this->getUserName();
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
	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
	}
	
	public function didUserPressLogin() {
		return isset($_POST[self::$login]);
	}
	
	public function didUserPressLogout() {
		if (isset($_POST[self::$logout])) {
			return true;
		}
	}
	
	public function getUserName() {
		if (isset($_POST[self::$name])) {
			return $_POST[self::$name];
		}
	}
	
	public function getPassword() {
		return $_POST[self::$password];
	}
	
	public function setHeader() {
		header("Location: " . $_SERVER['REQUEST_URI']);
		$this->setMessage();
	}
	
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
				default:
					self::$message = '';
					break;
			}
		} 
		unset($_SESSION['flashMessage']);
	}
}