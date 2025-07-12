<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Document</title>
    
</head>
<body>
    <div class="contenedor-pequeno">
        <a href="index.php?accion=cargarclientes" class="boton">Volver</a>
        <h1>Insercion de Clientes</h1>
        <hr>
        <form action="index.php?accion=guardarcliente" method="post">
            <input type="text" name="txtNom" placeholder="Nombre">
            <input type="text" name="txtEma" placeholder="Email">
            <input type="text" name="txtTel" placeholder="Telefono">
            <input type="text" name="txtDir" placeholder="Direccion">
            <input type="submit" value="Guardar">
        </form>
    </div>
    
</body>
</html>
