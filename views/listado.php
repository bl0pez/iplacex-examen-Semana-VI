<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pedidos</title>
</head>
<body>
    <table cellpadding="5" border="1">
        <thead>
            <tr>
                <th>Mesa</th>
                <th>Descripcion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(empty($pedidos)) {
                    echo "<tr><td colspan='5' style='text-align: center'>No hay pedidos</td></tr>";
                } else {
                    foreach($pedidos as $pedido) {
                        echo "<tr>";
                        echo "<td>".$pedido['mesa']."</td>";
                        echo "<td>".$pedido['descripcion']."</td>";
                        echo "<td><a href='inicio.php?op=eliminar&id=".$pedido['id']."'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                }
            
            ?>
        </tbody>
    </table>

    <button
        type="button"
        onclick="window.location.href='inicio.php?op=agregar'"
        style="margin-top: 20px;"
    >
        Volver
    </button>

</body>
</html>