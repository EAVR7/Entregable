<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Registrar Usuario</title>
</head>
<body>
    <div class="contenedor-pequeno">
        <a href="index.php?accion=cargarclientes" class="boton">Volver</a>
        <h2>Registrar Nuevo Usuario</h2>

        <form action="index.php?accion=guardarusuario" method="post">
            <input type="text" name="txtNom" placeholder="Nombre completo" required><br>
            <input type="email" name="txtEmail" placeholder="Correo electrónico" required><br>
            <input type="password" name="txtPass" placeholder="Contraseña" required><br>

            <label for="rol">Rol:</label>
            <select name="txtRol" required>
                <option value="">Seleccione un rol</option>
                <option value="admin">Administrador</option>
                <option value="usuario">Usuario</option>
            </select><br>

            <input type="submit" value="Registrar Usuario">
        </form>
    </div>
</body>
</html>
