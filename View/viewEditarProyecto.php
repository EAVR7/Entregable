<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Editar Proyecto</title>
</head>
<body>
    <div class="contenedor-pequeno">
        <a class="boton" href="index.php?accion=cargarproyectos">← Volver</a>
        <h1>Editar Proyecto</h1>
        <form class="formulario" action="index.php?accion=editarproyecto" method="post">
            <input type="hidden" name="txtId" value="<?= $proyecto->getIdproyecto() ?>">

            <div class="campo">
                <label>Nombre:</label>
                <input type="text" name="txtNom" value="<?= $proyecto->getNombre() ?>" required>
            </div>

            <div class="campo">
                <label>Descripción:</label>
                <input type="text" name="txtDes" value="<?= $proyecto->getDescripcion() ?>" required>
            </div>

            <div class="campo">
                <label>Cliente:</label>
                <select name="txtCli" required>
                    <?php foreach ($clientes as $cli): ?>
                        <option value="<?= $cli->getIdcliente() ?>" <?= $cli->getIdcliente() == $proyecto->getClienteId() ? 'selected' : '' ?>>
                            <?= $cli->getNombre() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="campo">
                <label>Fecha de Inicio:</label>
                <input type="date" name="txtIni" value="<?= $proyecto->getFechaInicio() ?>" required>
            </div>

            <div class="campo">
                <label>Fecha de Finalización:</label>
                <input type="date" name="txtFin" value="<?= $proyecto->getFechaFin() ?>" required>
            </div>

            <div class="campo">
                <label>Estado:</label>
                <select name="txtEst" required>
                    <option value="Pendiente" <?= $proyecto->getEstado() == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                    <option value="En progreso" <?= $proyecto->getEstado() == 'En progreso' ? 'selected' : '' ?>>En progreso</option>
                    <option value="Finalizado" <?= $proyecto->getEstado() == 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
                </select>
            </div>

            <input class="boton" type="submit" value="Guardar Cambios">
        </form>
    </div>
</body>
</html>
