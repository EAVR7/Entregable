<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Editar Cliente</title>
</head>
<body>
    <div class="contenedor-pequeno">
        <a href="index.php?accion=cargarclientes" class="boton">Volver</a>
        <h1>Editar Cliente</h1>
        <hr>

        <form action="index.php?accion=editarcliente" method="post" class="formulario">
            <input type="hidden" name="txtId" value="<?= $cliente->getIdcliente() ?>">

            <div class="campo">
                <label>Nombre:</label>
                <input type="text" name="txtNom" value="<?= $cliente->getNombre() ?>" required>
            </div>

            <div class="campo">
                <label>Email:</label>
                <input type="email" name="txtEma" value="<?= $cliente->getEmail() ?>" required>
            </div>

            <div class="campo">
                <label>Teléfono:</label>
                <input type="text" name="txtTel" value="<?= $cliente->getTelefono() ?>" required>
            </div>

            <div class="campo">
                <label>Dirección:</label>
                <input type="text" name="txtDir" value="<?= $cliente->getDireccion() ?>" required>
            </div>

            <input type="submit" value="Guardar Cambios" class="boton">
        </form>
    </div>
</body>
</html>
