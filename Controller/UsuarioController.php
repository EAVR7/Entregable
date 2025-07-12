<?php
require_once './model/UsuarioModel.php';
require_once './model/Usuario.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function guardar() {
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] !== 'admin') {
        echo "Acceso denegado.";
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = new Usuario();
        $usuario->setNombre($_POST['txtNom']);
        $usuario->setEmail($_POST['txtEmail']);
        $usuario->setPassword(md5($_POST['txtPass']));
        $usuario->setRol($_POST['txtRol']);

        $this->model->guardar($usuario);
        header('Location: index.php?accion=login');
    } else {
        require_once './View/viewGuardarUsuario.php';
    }
}

    public function cargar() {
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            echo "Acceso denegado.";
            return;
        }

        $usuarios = $this->model->cargar();
        require_once './View/viewCargarUsuarios.php';
    }

    public function borrar() {
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            echo "Acceso denegado.";
            return;
        }

        if (isset($_GET['idusu'])) {
            $this->model->borrar($_GET['idusu']);
        }
        header('Location: index.php?accion=cargarusuarios');
    }

    public function editar() {
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            echo "Acceso denegado.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $usuario->setIdusuario($_POST['txtId']);
            $usuario->setNombre($_POST['txtNom']);
            $usuario->setEmail($_POST['txtEmail']);
            $usuario->setRol($_POST['txtRol']);

            $this->model->modificar($usuario);
            header("Location: index.php?accion=cargarusuarios");
        } else if (isset($_GET['idusu'])) {
            $usuario = $this->model->obtenerPorId($_GET['idusu']);
            require_once './View/viewEditarUsuario.php';
        }
    }
}
