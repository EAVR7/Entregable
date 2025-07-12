<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Login</title>
</head>
<body>
    <div class="contenedor-pequeno">
    <h2>Iniciar Sesión</h2>
    <form action="index.php?accion=login" method="post">
        <input type="email" name="txtEmail" placeholder="Correo" required>
        <input type="password" name="txtPass" placeholder="Contraseña" required>
        <input type="submit" value="Ingresar">
    </form>
    </div>
</body>
</html>
