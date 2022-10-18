<?php
require_once './app/view/user.view.php';
require_once './app/model/user.model.php';
require_once './app/helper/user.helper.php';

class userController {
    private $view;
    private $model;
    private $UserHelper;
    
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new userView();
        $this->UserHelper = new UserHelper();
        if(strnatcmp(phpversion(), '5.4.0') >= 0) {
            if (session_status() == PHP_SESSION_NONE) {
             session_start();
            }else if(session_id() == ''){
             session_start();}}
        }

    public function showFormLogin() {
        $this->view->showFormLogin();
    }
    public function validateUser() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->getUserByEmail($email);
        if ($user && password_verify($password, $user->password)) {
        session_start();
        $_SESSION['USER_ID'] = $user->ID;
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['IS_LOGGED'] = true;
        header("Location: " . BASE_URL);} 
        else { $this->view->showFormLogin("El usuario o la contraseña no existe.");}}}

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}