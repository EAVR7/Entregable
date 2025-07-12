<?php
class Usuario {
    private $idusuario;
    private $nombre;
    private $email;
    private $password;
    private $rol;
    private $fecha_creado;

    public function getIdusuario() {
        return $this->idusuario;
    }
    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRol() {
        return $this->rol;
    }
    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getFechaCreado() {
        return $this->fecha_creado;
    }
    public function setFechaCreado($fecha_creado) {
        $this->fecha_creado = $fecha_creado;
    }
}
?>
