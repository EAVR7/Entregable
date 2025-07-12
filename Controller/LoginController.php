<?php
require_once './model/LoginModel.php';

class LoginController {
    private $model;

    public function __construct() {
        $this->model = new LoginModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = $this->model->verificar($email, $password);

            if ($usuario) {
                $_SESSION['usuario'] = $usuario;

                header('Location: index.php?accion=cargarclientes');
                exit;
            } else {
                $error = "Correo o contraseña incorrectos";
                require_once './View/viewIniciarSesion.php';
            }
        } else {
            require_once './View/viewIniciarSesion.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?accion=login');
    }
}
