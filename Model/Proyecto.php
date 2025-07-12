<?php

    class Proyecto{
    private $idproyecto;
    private $nombre;
    private $descripcion;
    private $cliente_id;
    private $fecha_inicio;
    private $fecha_fin;
    private $estado;
    private $fecha_creado;
    private $clienteNombre;


    
    public function getIdproyecto() {
        return $this->idproyecto;
    }

    public function setIdproyecto($idproyecto) {
        $this->idproyecto = $idproyecto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getClienteId() {
        return $this->cliente_id;
    }

    public function setClienteId($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function getFechaInicio() {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getFechaCreado() {
        return $this->fecha_creado;
    }

    public function setFechaCreado($fecha_creado) {
        $this->fecha_creado = $fecha_creado;
    }
    public function getClienteNombre() {
    return $this->clienteNombre;
    }

    public function setClienteNombre($clienteNombre) {
    $this->clienteNombre = $clienteNombre;
    }

}
?>