<?php 
    require("controllers/PedidoController.php");

    $pedidoController = new PedidoController();

    $validacion = (isset($_GET['op']) && !empty($_GET['op']));

    if (!$validacion) {
        $pedidoController->inicio();
    } else {
        $op=$_GET["op"];

        if($op=="inicio"){
            $pedidoController->inicio();
        }

        if($op=="listar"){
            $pedidoController->listar();
        }

        if($op=="listarProduccion"){
            $pedidoController->listarProduccion();
        }

        if($op=="agregar"){
            $pedidoController->agregar();
        }

        if($op=="agregarPedido") {
            $mesa = $_POST['mesa'];
            $descripcion = $_POST['descripcion'];

            $pedido = new Pedido();
            $pedido->setMesa($mesa);
            $pedido->setDescripcion($descripcion);

            $pedidoController->agregarPedido($pedido);
        }

        if($op=="finalizarPedido"){
            $id = $_GET['id'];
            $pedidoController->finalizarPedido($id);
        }

        if($op=="eliminar"){
            $id = $_GET['id'];
            $pedidoController->eliminar($id);
        }

    }    


?>