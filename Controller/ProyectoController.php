<?php
require_once './model/ProyectoModel.php';
require_once './model/ClienteModel.php';

class ProyectoController {

    public function cargar() {
        $model = new ProyectoModel();
        $proyectos = $model->cargar();
        require_once './view/viewCargarProyectos.php';
    }

    public function guardar() {
        if ($_SESSION['usuario']['rol'] !== 'admin') {
            echo "Acceso denegado.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pro = new Proyecto();
            $pro->setNombre($_POST['txtNom']);
            $pro->setDescripcion($_POST['txtDes']);
            $pro->setClienteId($_POST['txtCli']);
            $pro->setFechaInicio($_POST['txtIni']);
            $pro->setFechaFin($_POST['txtFin']);
            $pro->setEstado($_POST['txtEst']);

            $model = new ProyectoModel();
            $model->guardar($pro);

            header("Location: index.php?accion=cargarproyectos");
        } else {
            $cliModel = new ClienteModel();
            $clientes = $cliModel->cargar();
            require_once './view/viewGuardarProyecto.php';
        }
    }

    public function borrar() {
        if ($_SESSION['usuario']['rol'] !== 'admin') {
            echo "Acceso denegado.";
            return;
        }

        if (isset($_GET['idpro'])) {
            $model = new ProyectoModel();
            $model->borrar($_GET['idpro']);
            header('Location: index.php?accion=cargarproyectos');
        }
    }
    public function editar() {
    $model = new ProyectoModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pro = new Proyecto();
            $pro->setIdproyecto($_POST['txtId']);
            $pro->setNombre($_POST['txtNom']);
            $pro->setDescripcion($_POST['txtDes']);
            $pro->setClienteId($_POST['txtCli']);
            $pro->setFechaInicio($_POST['txtIni']);
            $pro->setFechaFin($_POST['txtFin']);
            $pro->setEstado($_POST['txtEst']);

            $model->modificar($pro);
            header("Location: index.php?accion=cargarproyectos");
        } else if (isset($_GET['idpro'])) {
            $proyecto = $model->obtenerPorId($_GET['idpro']);

            require_once './model/ClienteModel.php';
            $cliModel = new ClienteModel();
            $clientes = $cliModel->listar();

            require_once './view/viewEditarProyecto.php';
        }
}

}
?>
