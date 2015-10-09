<?php

namespace view;

class NavigationView {
    
    private static $registerUrl = "?register";
    private static $home = "/";

    public function userWantsToRegister() {
        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url, self::$registerUrl) !== false) {
            return true;
        } else {
            return false;
        }
    }

}