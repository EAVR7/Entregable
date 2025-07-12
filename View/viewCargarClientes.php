<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../CSS/estilo.css">
</head>
<body>
    <div class="contenedor-grande">
        <?php include 'menu.php'; ?>

        <h1>Lista de Clientes</h1>
        <hr>

        <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
            <div class="flex-espaciado">
                <a class="boton" href="index.php?accion=guardarcliente">Registrar Nuevo Cliente</a>
                <a class="boton" href="reportes/ReporteClientes.php" target="_blank">Reporte de Clientes (PDF)</a>
            </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <?php if ($_SESSION['usuario']['rol'] === 'admin') : ?>
                        <th>Eliminar</th>
                        <th>Modificar</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cli): ?>
                    <tr>
                        <td><?= $cli->getIdcliente() ?></td>
                        <td><?= $cli->getNombre() ?></td>
                        <td><?= $cli->getEmail() ?></td>
                        <td><?= $cli->getTelefono() ?></td>
                        <td><?= $cli->getDireccion() ?></td>
                        <?php if ($_SESSION['usuario']['rol'] === 'admin') : ?>
                            <td><a href="index.php?accion=borrarcliente&idcli=<?= $cli->getIdcliente() ?>">Borrar</a></td>
                            <td><a href="index.php?accion=editarcliente&idcli=<?= $cli->getIdcliente() ?>">Editar</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
