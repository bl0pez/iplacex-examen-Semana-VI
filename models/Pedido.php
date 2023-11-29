<?php

require_once 'db.php';

class Pedido {
    private $id;
    private $mesa;
    private $descripcion;
    private $estado;
    private $fechahora;

    function __construct() {}

    function getId() {
        return $this->id;
    }

    function getMesa() {
        return $this->mesa;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFechahora() {
        return $this->fechahora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMesa($mesa) {
        $this->mesa = $mesa;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFechahora($fechahora) {
        $this->fechahora = $fechahora;
    }

    public function listar() {
        $db = new DB();
        $query = "SELECT * FROM pedido";
        $consulta = $db->getConexion()->prepare($query);
        $consulta->execute();

        $pedidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $pedidos;
    }

    public function listarProduccion() {
        $db = new DB();
        $query = "SELECT * FROM pedido WHERE estado = 0";
        $consulta = $db->getConexion()->prepare($query);
        $consulta->execute();

        $pedidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $pedidos;
    }

    public function agregar($pedido) {
        $id = null;
        $mesa = $pedido->getMesa();
        $descripcion = $pedido->getDescripcion();
        $estado = false;
        $fechahora = date("Y-m-d H:i:s");

        
        $db = new DB();
        $req = $db->getConexion()->prepare("INSERT INTO pedido (id, mesa, descripcion, estado, fechahora) VALUES (?, ?, ?, ?, ?)");
        $req->bindParam(1, $id);
        $req->bindParam(2, $mesa);
        $req->bindParam(3, $descripcion);
        $req->bindParam(4, $estado);
        $req->bindParam(5, $fechahora);
        $req->execute();

    }

    public function finalizarPedido($pedidoId) {
        $db = new DB();
        $req = $db->getConexion()->prepare("UPDATE pedido SET estado = 1 WHERE id = ?");
        $req->bindParam(1, $pedidoId);
        $req->execute();
    }

    public function eliminar($pedidoId) {
        $db = new DB();
        $req = $db->getConexion()->prepare("DELETE FROM pedido WHERE id = ?");
        $req->bindParam(1, $pedidoId);
        $req->execute();
    }

}

?>