<?php

namespace view;

class LayoutView {
  private static $didRegisterSucceed = false;
  private static $pressedRegister = false;
  
  public function render($isLoggedIn, $htmlContent, RegisterView $regView, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderRegisterLink(self::$didRegisterSucceed) . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $this->renderContent($isLoggedIn, $htmlContent) . '
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
  
  public function renderRegisterLink($didRegisterSucceed) {
    if ($didRegisterSucceed) {
      return '<a href="/" name="register">Register a new user</a>';
    }
    if (strpos($_SERVER['REQUEST_URI'], "register") !== false) {
      return '<a href="/" name="back">Back to login</a>';
    } else {
      return '<a href="?register" name="register">Register a new user</a>';
    }
  }

    private function renderContent($isLoggedIn, $htmlContent) {
      return $htmlContent;
    }

  
    // private function renderContent($isLoggedIn, $pressedRegister, $v, $regView) {
    //   if ($didRegisterSucceed) {
    //     return $v->response($isLoggedIn);
    //   } else if (!$didRegisterSucceed && $pressedRegister) {
    //     return $regView->generateRegisterFormHTML();
    //   }
    //     if ($pressedRegister) {
    //         return $regView->response($pressedRegister);
    //     }
    //     else {
    //         return $v->response($isLoggedIn);
    //     }
    // }
    
}