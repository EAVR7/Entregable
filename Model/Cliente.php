<?php

    class Cliente{
    private  $idcliente;
    private  $nombre;
    private  $email;
    private  $telefono;
    private $direccion;
    
    public function getIdcliente(){
        return $this->idcliente;
    }
    public function setIdcliente($idcliente){
        $this->idcliente = $idcliente;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    }
?>