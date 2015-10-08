<?php

namespace view;

class NavigationView {
    
    private static $registerUrl = "register";


    public function userWantsToRegister() {
        return (isset($_GET[self::$registerUrl]));
    }
    
    
}