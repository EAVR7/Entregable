<?php  
    require_once './config/DB.php';
    require_once 'Proyecto.php';

    class ProyectoModel{
        private $db;
        public function __construct(){
            $this->db=DB::conectar();
        }

        public function guardar(Proyecto $pro){
            $sql = "INSERT INTO proyecto (nombre, descripcion, cliente_id, fecha_inicio, fecha_fin, estado) VALUES (:nom, :des, :idcli, :ini, :fin, :est)";
            $ps=$this->db->prepare($sql);
            $ps->bindParam(":nom", $pro->getNombre());
            $ps->bindParam(":des", $pro->getDescripcion());
            $ps->bindParam(":idcli", $pro->getClienteId());
            $ps->bindParam(":ini", $pro->getFechaInicio());
            $ps->bindParam(":fin", $pro->getFechaFin());
            $ps->bindParam(":est", $pro->getEstado());
            
            $ps->execute();
        }

        public function cargar(){
            $sql = "SELECT p.idproyecto, p.nombre, p.descripcion, p.fecha_inicio, p.fecha_fin, 
                   p.estado, c.nombre AS cliente_nombre
            FROM proyecto p
            JOIN cliente c ON p.cliente_id = c.idcliente";

            $ps = $this->db->prepare($sql);
            $ps->execute();
            $filas = $ps->fetchAll();

            $proyectos = [];
            foreach($filas as $f){
            $pro = new Proyecto();
            $pro->setIdproyecto($f['idproyecto']);
            $pro->setNombre($f['nombre']);
            $pro->setDescripcion($f['descripcion']);
            $pro->setFechaInicio($f['fecha_inicio']);
            $pro->setFechaFin($f['fecha_fin']);
            $pro->setEstado($f['estado']);
            $pro->setClienteNombre($f['cliente_nombre']);

            $proyectos[] = $pro;
        }
        return $proyectos;
    }

        public function borrar($idpro){
            $sql="delete from proyecto where idproyecto=:idpro";
            $ps=$this->db->prepare($sql);
            $ps->bindParam(':idpro', $idpro);
            $ps->execute();
        }
        public function modificar(Proyecto $pro) {
            $sql = "UPDATE proyecto SET 
                nombre = :nom,
                descripcion = :des,
                cliente_id = :idcli,
                fecha_inicio = :ini,
                fecha_fin = :fin,
                estado = :est
            WHERE idproyecto = :id";
    
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':nom', $pro->getNombre());
            $ps->bindParam(':des', $pro->getDescripcion());
            $ps->bindParam(':idcli', $pro->getClienteId());
            $ps->bindParam(':ini', $pro->getFechaInicio());
            $ps->bindParam(':fin', $pro->getFechaFin());
            $ps->bindParam(':est', $pro->getEstado());
            $ps->bindParam(':id', $pro->getIdproyecto());
            $ps->execute();
        }
        public function obtenerPorId($id) {
            $sql = "SELECT * FROM proyecto WHERE idproyecto = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':id', $id);
            $ps->execute();
            $fila = $ps->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
            $pro = new Proyecto();
            $pro->setIdproyecto($fila['idproyecto']);
            $pro->setNombre($fila['nombre']);
            $pro->setDescripcion($fila['descripcion']);
            $pro->setClienteId($fila['cliente_id']);
            $pro->setFechaInicio($fila['fecha_inicio']);
            $pro->setFechaFin($fila['fecha_fin']);
            $pro->setEstado($fila['estado']);
            return $pro;
        }
        return null;
}



    }
?>