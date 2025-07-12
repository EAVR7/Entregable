<?php
session_start();

require_once './controller/LoginController.php';
require_once './controller/UsuarioController.php';
require_once './controller/ClienteController.php';
require_once './controller/ProyectoController.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : 'login';

$acciones_libres = ['login', 'guardarusuario'];

if (!isset($_SESSION['usuario']) && !in_array($accion, $acciones_libres)) {
    header('Location: index.php?accion=login');
    exit;
}

switch ($accion) {
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;

    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;

    case 'guardarusuario':
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] === 'admin') {
            $controller = new UsuarioController();
            $controller->guardar();
        } else {
            echo "<p style='color:red;'>Acceso denegado. Solo administradores pueden registrar nuevos usuarios.</p>";
        }
        break;

    case 'cargarusuarios':
    case 'borrarusuario':
    case 'editarusuario':
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            echo "<p style='color:red;'>Acceso denegado. Solo administradores pueden acceder a esta sección.</p>";
            exit;
        }
        $controller = new UsuarioController();
        if ($accion === 'cargarusuarios') $controller->cargar();
        if ($accion === 'borrarusuario') $controller->borrar();
        if ($accion === 'editarusuario') $controller->editar();
        break;

    case 'cargarclientes':
        $controller = new ClienteController();
        $controller->cargar();
        break;

    case 'editarcliente':
        $controller = new ClienteController();
        $controller->editar();
        break;

    case 'guardarcliente':
        $controller = new ClienteController();
        $controller->guardar();
        break;

    case 'borrarcliente':
        $controller = new ClienteController();
        $controller->borrar();
        break;

    case 'cargarproyectos':
        $controller = new ProyectoController();
        $controller->cargar();
        break;

    case 'editarproyecto':
        $controller = new ProyectoController();
        $controller->editar();
        break;

    case 'guardarproyecto':
        $controller = new ProyectoController();
        $controller->guardar();
        break;

    case 'borrarproyecto':
        $controller = new ProyectoController();
        $controller->borrar();
        break;

    default:
        echo "<h2>Acción no válida</h2>";
        break;
}
