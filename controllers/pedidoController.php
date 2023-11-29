<?php 
    require_once 'models/Pedido.php';

class pedidoController {
    public $pedido;

    public function __construct() {
        $this->pedido = new Pedido();
    }

    public function inicio() {
        include 'views/inicio.php';
    }

    public function listar() {
        $pedidos = $this->pedido->listar();
        include 'views/listado.php';
    }

    public function agregar() {
        include 'views/agregar.php';
    }

    public function agregarPedido($pedido) {
        $this->pedido->agregar($pedido);
        echo "<script>alert('Pedido agregado correctamente')</script>";
        $this->agregar();
    }

    public function listarProduccion() {
        $pedidos = $this->pedido->listarProduccion();
        include 'views/produccion.php';
    }

    public function finalizarPedido($id) {
        $this->pedido->finalizarPedido($id);
        echo "<script>alert('Pedido finalizado correctamente')</script>";
        $this->listarProduccion();
    }

    public function eliminar($id) {
        $this->pedido->eliminar($id);
        echo "<script>alert('Pedido eliminado correctamente')</script>";
        $this->listar();
    }



}

?>