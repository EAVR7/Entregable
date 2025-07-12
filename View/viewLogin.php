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
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post" action="index.php?accion=login">
    <input type="email" name="email" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="submit" value="Iniciar Sesión">
</form>
</div>

</body>
</html>
