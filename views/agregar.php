<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar - Pedido</title>
</head>
<body>
    
    <h1>Pedido</h1>

    <form
        action="inicio.php?op=agregarPedido"
        method="POST"
    >

        <label for="mesa">Mesa</label>
        <select name="mesa" id="mesa" required>
            <option value="" disable>seleccione una opcion</option>    
            <?php 
                for($i = 1; $i <= 20; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                
            ?>
        </select>

        <div
            style="
                display: flex;
                item-align: center;
                gap: 10px;
                margin-top: 10px;
            "
        >
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5" required></textarea>
        </div>

        <div
            style="margin-top: 10px;"
        >
            <button type="submit">Agregar</button>
            <button 
                type="button"
                onclick="window.location.href='inicio.php?op=listar'"
            >
                Ver pedido
            </button>
            <button 
                type="button"
                onclick="window.location.href='inicio.php'"
            >
                Volver
            </button>
        </div>

    </form>


</body>
</html>