<?php
// Iniciar la sesión en el archivo donde se necesitan las variables de sesión
session_start(); // Asegúrate de que esto esté al principio de tu archivo

// Comprobar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirige al login
    header('Location: /login_multitenant/index.php');
    exit;
}
?>

<!-- Aquí tu HTML y el contenido del dashboard -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Admin</title>
</head>
<body>
    <h1>Bienvenido al Dashboard</h1>
    <p>Hola, <?php echo $_SESSION['usuario']['nombre_usu']; ?>. Tienes acceso completo como Administrador.</p>

    <h2>Gestión de Empresas</h2>
    <ul>
        <li><a href="index.php?C=EmpresaController&A=listarEmpresas">Ver Empresas</a></li>
        <li><a href="index.php?C=EmpresaController&A=crearEmpresa">Crear Empresa</a></li>
    </ul>

    <h2>Gestión de Usuarios</h2>
    <ul>
        <li><a href="index.php?C=UsuarioController&A=listarUsuarios">Ver Usuarios</a></li>
        <li><a href="index.php?C=UsuarioController&A=crearUsuario">Crear Usuario</a></li>
    </ul>

    <h2>Salir</h2>
    <a href="index.php?C=LoginController&A=logout">Cerrar sesión</a>
</body>
</html>
