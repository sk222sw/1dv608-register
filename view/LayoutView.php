<?php

class LayoutView {
  
  public function render($isLoggedIn, $pressedRegister, LoginView $v, RegisterView $regView, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderRegisterLink() . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $this->renderContent($isLoggedIn, $pressedRegister, $v, $regView) . '
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  
  private function renderRegisterLink() {
    if (strpos($_SERVER['REQUEST_URI'], "register=1") !== false) {
      return '<a href="/" name="back">Back to login</a>';
    } else {
      return '<a href="?register=1" name="register">Register a new user</a>';
    }
  }
  
    private function renderContent($isLoggedIn, $pressedRegister, $v, $regView) {
        if ($pressedRegister) {
            //render register view
            return $regView->response($pressedRegister);
        }
        else {
            return $v->response($isLoggedIn);
        }
    }
    
}