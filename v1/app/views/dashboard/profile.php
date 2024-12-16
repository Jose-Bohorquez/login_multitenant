<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Bienvenido a tu perfil, <?php echo $_SESSION['usuario']['nombre_usu']; ?></h1>

    <h2>Información del Perfil</h2>
    <ul>
        <li><strong>Nombre:</strong> <?php echo $_SESSION['usuario']['nombre_usu']; ?> <?php echo $_SESSION['usuario']['apellidos_usu']; ?></li>
        <li><strong>Correo:</strong> <?php echo $_SESSION['usuario']['correo_usu']; ?></li>
        <li><strong>Teléfono:</strong> <?php echo $_SESSION['usuario']['telefono_usu']; ?></li>
        <li><strong>Empresa:</strong> <?php echo $_SESSION['usuario']['empresa_usu']; ?></li>
        <li><strong>Cargo:</strong> <?php echo $_SESSION['usuario']['Cargo']; ?></li>
    </ul>

    <h2>Editar Perfil</h2>
    <form action="index.php?C=UsuarioController&A=editarPerfil" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $_SESSION['usuario']['nombre_usu']; ?>"><br><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $_SESSION['usuario']['correo_usu']; ?>"><br><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo $_SESSION['usuario']['telefono_usu']; ?>"><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <h2>Salir</h2>
    <a href="index.php?C=LoginController&A=logout">Cerrar sesión</a>
</body>
</html>
