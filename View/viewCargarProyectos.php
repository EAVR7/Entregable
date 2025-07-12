<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
    <link rel="stylesheet" href="../CSS/estilo.css">
</head>
<body>
    <div class="contenedor-grande">
        <?php include 'menu.php'; ?>
        <h1>Lista de Proyectos</h1>
        <hr>

        <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
            <div class="flex-espaciado">
                <a class="boton" href="index.php?accion=guardarproyecto">Registrar Nuevo Proyecto</a>
                <a class="boton" href="reportes/ReporteProyectos.php" target="_blank">Reporte de Proyectos (PDF)</a>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cliente</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
                        <th>Eliminar</th>
                        <th>Modificar</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyectos as $pro): ?>
                <tr>
                    <td><?= $pro->getIdproyecto() ?></td>
                    <td><?= $pro->getNombre() ?></td>
                    <td><?= $pro->getDescripcion() ?></td>
                    <td><?= $pro->getClienteNombre() ?></td>
                    <td><?= $pro->getFechaInicio() ?></td>
                    <td><?= $pro->getFechaFin() ?></td>
                    <td><?= $pro->getEstado() ?></td>
                    <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
                        <td><a href="index.php?accion=borrarproyecto&idpro=<?= $pro->getIdproyecto() ?>">Borrar</a></td>
                        <td><a href="index.php?accion=editarproyecto&idpro=<?= $pro->getIdproyecto() ?>">Editar</a></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
