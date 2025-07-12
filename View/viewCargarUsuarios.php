<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Lista de Usuarios</title>
</head>
<body>
    <div class="contenedor-grande">
        <?php include 'menu.php'; ?>
        
        <h1>Usuarios Registrados</h1>
        
        <a class="boton" href="index.php?accion=guardarusuario">Registrar Nuevo</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha</th>
                    <th>Borrar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usu): ?>
                    <tr>
                        <td><?= $usu->getIdusuario() ?></td>
                        <td><?= $usu->getNombre() ?></td>
                        <td><?= $usu->getEmail() ?></td>
                        <td><?= $usu->getRol() ?></td>
                        <td><?= $usu->getFechaCreado() ?></td>
                        <td><a href="index.php?accion=borrarusuario&idusu=<?= $usu->getIdusuario() ?>">Borrar</a></td>
                        <td><a href="index.php?accion=editarusuario&idusu=<?= $usu->getIdusuario() ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
