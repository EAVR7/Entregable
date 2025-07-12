<?php
require_once './config/DB.php';
require_once 'Usuario.php';

class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(Usuario $usuario) {
        $sql = "INSERT INTO usuario (nombre, email, password, rol) 
                VALUES (:nom, :ema, :pass, :rol)";
        $ps = $this->db->prepare($sql);

  
        $ps->bindParam(':nom', $usuario->getNombre());
        $ps->bindParam(':ema', $usuario->getEmail());
        $ps->bindParam(':pass', $usuario->getPassword());
        $ps->bindParam(':rol', $usuario->getRol());

        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM usuario";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();

        $usuarios = [];
        foreach ($filas as $f) {
            $usu = new Usuario();
            $usu->setIdusuario($f[0]);
            $usu->setNombre($f[1]);
            $usu->setEmail($f[2]);
            $usu->setPassword($f[3]);
            $usu->setRol($f[4]);
            $usu->setFechaCreado($f[5]);
            $usuarios[] = $usu;
        }
        return $usuarios;
    }

    public function borrar($idusu) {
        $sql = "DELETE FROM usuario WHERE idusuario = :idusu";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':idusu', $idusu);
        $ps->execute();
    }
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM usuario WHERE idusuario = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id', $id);
        $ps->execute();
        $fila = $ps->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
        $usu = new Usuario();
        $usu->setIdusuario($fila['idusuario']);
        $usu->setNombre($fila['nombre']);
        $usu->setEmail($fila['email']);
        $usu->setPassword($fila['password']);
        $usu->setRol($fila['rol']);
        return $usu;
    }
    return null;
}
    public function modificar(Usuario $usuario) {
        $sql = "UPDATE usuario SET nombre = :nom, email = :ema, rol = :rol WHERE idusuario = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':nom', $usuario->getNombre());
        $ps->bindParam(':ema', $usuario->getEmail());
        $ps->bindParam(':rol', $usuario->getRol());
        $ps->bindParam(':id', $usuario->getIdusuario());
        $ps->execute();
}

}
?>
