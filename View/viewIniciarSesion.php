<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="contenedor-pequeno">
        <h2>Iniciar Sesión</h2>

        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="index.php?accion=login" method="post">
            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Contraseña:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Ingresar">
        </form>

        <br>
        <a href="index.php?accion=guardarusuario">Crear Cuenta</a>
    </div>
</body>
</html>
