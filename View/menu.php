<nav>
    <ul>
        <li><a href="index.php?accion=cargarproyectos">Proyectos</a></li>
        <li><a href="index.php?accion=cargarclientes">Clientes</a></li>

        <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
            <li><a href="index.php?accion=cargarusuarios">Usuarios</a></li>
        <?php endif; ?>

        <li><a href="index.php?accion=logout">Cerrar sesión</a></li>
    </ul>
</nav>
