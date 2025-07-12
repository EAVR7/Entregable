<?php
require_once './model/ClienteModel.php';

class ClienteController {

    public function cargar () {
        $model = new ClienteModel();
        $clientes = $model->cargar();
        require_once './view/viewCargarClientes.php';
    }

    public function guardar () {
        if ($_SESSION['usuario']['rol'] !== 'admin') {
            echo "Acceso denegado.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new ClienteModel();
            $cliente = new Cliente();
            $cliente->setNombre($_POST['txtNom']);
            $cliente->setEmail($_POST['txtEma']);
            $cliente->setTelefono($_POST['txtTel']);
            $cliente->setDireccion($_POST['txtDir']);
            $model->guardar($cliente);
            header('Location: index.php?accion=cargarclientes');
        } else {
            require_once './view/viewGuardarCliente.php';
        }
    }

    public function borrar () {
        if ($_SESSION['usuario']['rol'] !== 'admin') {
            echo "Acceso denegado.";
            return;
        }

        if (isset($_GET['idcli'])) {
            $model = new ClienteModel();
            $model->borrar($_GET['idcli']);
            header('Location: index.php?accion=cargarclientes');
        }
    }
    public function editar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cliente = new Cliente();
        $cliente->setIdcliente($_POST['txtId']);
        $cliente->setNombre($_POST['txtNom']);
        $cliente->setEmail($_POST['txtEma']);
        $cliente->setTelefono($_POST['txtTel']);
        $cliente->setDireccion($_POST['txtDir']);

        $model = new ClienteModel();
        $model->modificar($cliente);

        header('Location: index.php?accion=cargarclientes');
    } else if (isset($_GET['idcli'])) {
        $model = new ClienteModel();
        $cliente = $model->obtenerPorId($_GET['idcli']);
        require_once './view/viewEditarCliente.php';
    }
}


    public function obtenerPorId($id) {
        $sql = "SELECT * FROM cliente WHERE idcliente = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id', $id);
        $ps->execute();
        $fila = $ps->fetch();

        $cli = new Cliente();
        $cli->setIdcliente($fila['idcliente']);
        $cli->setNombre($fila['nombre']);
        $cli->setEmail($fila['email']);
        $cli->setTelefono($fila['telefono']);
        $cli->setDireccion($fila['direccion']);
        return $cli;
    }


}
?>
