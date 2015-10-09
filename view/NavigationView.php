<?php

namespace view;

class NavigationView {
    
    private static $registerUrl = "register";
    private static $home = "/";

    public function userWantsToRegister() {
        return isset($_GET[self::$registerUrl]);
    }

}