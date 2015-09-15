<?php

class LoginController {
    
    private $view;
    private $model;
    
    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }
}