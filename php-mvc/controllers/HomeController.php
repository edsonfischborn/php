<?php

class HomeController {
    function index(){
        session_start();
        include PAGES_DIR.'/home/home.php';
    }
}