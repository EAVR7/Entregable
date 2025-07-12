<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Editar Usuario</title>
</head>
<body>
    <div class="contenedor-pequeno">
    <a href="index.php?accion=cargarusuarios">Volver</a>
    <h1>Editar Usuario</h1>
    <form action="index.php?accion=editarusuario" method="post">
        <input type="hidden" name="txtId" value="<?= $usuario->getIdusuario() ?>">

        <label>Nombre:</label><br>
        <input type="text" name="txtNom" value="<?= $usuario->getNombre() ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="txtEmail" value="<?= $usuario->getEmail() ?>" required><br><br>

        <label>Rol:</label><br>
        <select name="txtRol" required>
            <option value="admin" <?= $usuario->getRol() === 'admin' ? 'selected' : '' ?>>admin</option>
            <option value="usuario" <?= $usuario->getRol() === 'usuario' ? 'selected' : '' ?>>usuario</option>
        </select><br><br>

        <input type="submit" value="Guardar Cambios">
    </form>
    </div>
</body>
</html>
