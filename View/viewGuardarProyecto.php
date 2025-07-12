<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Nuevo Proyecto</title>
</head>
<body>
    <div class="contenedor-pequeno">
    <a href="index.php?accion=cargarclientes" class="boton">Volver</a>
    <h1>Registro de Proyecto</h1>
    <hr>
    <form action="index.php?accion=guardarproyecto" method="post">
        <input type="text" name="txtNom" placeholder="Nombre del proyecto" required><br>
        <input type="text" name="txtDes" placeholder="Descripción" required><br>

        <label>Cliente:</label>
        <select name="txtCli" required>
            <option value="">Seleccione un cliente</option>
            <?php foreach ($clientes as $cli): ?>
                <option value="<?= $cli->getIdcliente() ?>">
                    <?= $cli->getNombre() ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Fecha Inicio:</label>
        <input type="date" name="txtIni" required><br>

        <label>Fecha Fin:</label>
        <input type="date" name="txtFin" required><br>

        <label>Estado:</label>
        <select name="txtEst" required>
            <option value="">Seleccione estado</option>
            <option value="Pendiente">Pendiente</option>
            <option value="En progreso">En progreso</option>
            <option value="Finalizado">Finalizado</option>
        </select><br>

        <input type="submit" value="Guardar Proyecto">
    </form>
   </div>
</body>
</html>
