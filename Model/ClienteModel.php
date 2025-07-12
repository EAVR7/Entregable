<?php  
require_once './config/DB.php';
require_once 'Cliente.php';

class ClienteModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(Cliente $cli) {
        $sql = "INSERT INTO cliente (nombre, email, telefono, direccion)
                VALUES (:nom, :ema, :tel, :dir)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":nom", $cli->getNombre());
        $ps->bindParam(":ema", $cli->getEmail());
        $ps->bindParam(":tel", $cli->getTelefono());
        $ps->bindParam(":dir", $cli->getDireccion());
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM cliente";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll(PDO::FETCH_ASSOC);

        $clientes = [];
        foreach ($filas as $f) {
            $cli = new Cliente();
            $cli->setIdcliente($f['idcliente']);
            $cli->setNombre($f['nombre']);
            $cli->setEmail($f['email']);
            $cli->setTelefono($f['telefono']);
            $cli->setDireccion($f['direccion']);
            $clientes[] = $cli;
        }
        return $clientes;
    }

    public function borrar($idcli) {
        $sql = "DELETE FROM cliente WHERE idcliente = :idcli";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':idcli', $idcli);
        $ps->execute();
    }

    public function listar() {
        $sql = "SELECT idcliente, nombre FROM cliente";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $datos = $ps->fetchAll(PDO::FETCH_ASSOC);

        $clientes = [];
        foreach ($datos as $fila) {
            $cli = new Cliente();
            $cli->setIdcliente($fila['idcliente']);
            $cli->setNombre($fila['nombre']); 
            $clientes[] = $cli;
        }
        return $clientes;
    }
    public function modificar(Cliente $cli) {
        $sql = "UPDATE cliente SET nombre = :nom, email = :ema, telefono = :tel, direccion = :dir WHERE idcliente = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':nom', $cli->getNombre());
        $ps->bindParam(':ema', $cli->getEmail());
        $ps->bindParam(':tel', $cli->getTelefono());
        $ps->bindParam(':dir', $cli->getDireccion());
        $ps->bindParam(':id', $cli->getIdcliente());
        $ps->execute();
    }
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM cliente WHERE idcliente = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id', $id);
        $ps->execute();
        $fila = $ps->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
        $cli = new Cliente();
        $cli->setIdcliente($fila['idcliente']);
        $cli->setNombre($fila['nombre']);
        $cli->setEmail($fila['email']);
        $cli->setTelefono($fila['telefono']);
        $cli->setDireccion($fila['direccion']);
        return $cli;
    }

    return null;
}


}
?>
