<?php

class UserController {

    private $userModel = null;

    public function __construct(){
        session_start();
        $this->userModel = new UserModel();
    }

    public function index(){
        header('location: '. HOME_URL);
    }

    public function logout(){
        session_destroy();
        header('location: '. HOME_URL);
    }

    public function login(){
        if(isset($_SESSION['user'])){
            header('location: '. HOME_URL);
            exit();
        }

        include PAGES_DIR.'/user/login.php';
    }

    public function auth(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('location: '. HOME_URL.'/usuario/login');
            exit();
        } 
        
        $user = $this->userModel->auth($email, $password); 
        
        if(!$user){
            header('location: '. HOME_URL.'/usuario/login');
            exit();
        }

        $_SESSION['user'] = $user;
        
        header('location: '. HOME_URL);
    }
}