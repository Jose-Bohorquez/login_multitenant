<!-- views/Roles/admin/servientrega/index.view.dashboard.Global.php -->
<?php 
    // Asegúrate de que el usuario esté autenticado
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['empresa_id']) || !isset($_SESSION['role'])) {
        header('Location: ?c=LoginCtlr&a=main'); // Si no está autenticado, redirige al login
        exit();
    }

    // Verifica si el rol no es 2
    if ($_SESSION['role'] !== 2) {
        header('Location: ?c=LoginCtlr&a=main'); // Si no es el rol 2, redirige al login
        exit();
    }

    // Verifica si la empresa_id no es 3
    if ($_SESSION['empresa_id'] !== 3) {
        header('Location: ?c=LoginCtlr&a=main'); // Si no es la empresa 3, redirige al login
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Servitel</title>
    <!-- Incluir Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregar iconos si es necesario -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Barra de navegación superior con nuevo gradiente -->
<nav class="navbar navbar-expand-lg" style="background: linear-gradient(to right, #212b59, #fbea90, #915d18);">
    <div class="container-fluid">
        <a class="text-white navbar-brand" href="#">Dashboard Servitel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="text-white nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="#">Estadísticas</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="#">Gestionar Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="?c=LoginCtlr&a=logOut">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<div class="container-fluid">
    <div class="row">

        <!-- Barra lateral de navegación -->
        <div class="col-md-3 col-lg-2 p-3 bg-light">
            <h4 class="mb-4">Menú</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Estadísticas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Configuración</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gestión de Usuarios</a>
                </li>
            </ul>
        </div>

        <br>

        <!-- Contenido principal -->
        <div class="col-md-9 col-lg-10 p-4">
            <h1>Bienvenido al Dashboard de Servitel</h1>
            <p>Aquí puedes ver las estadísticas y gestionar la aplicación de Servientrega.</p>

            <!-- Tarjetas de estadísticas -->
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                <div class="col">
                    <div class="card shadow-sm pt-3 pb-3 mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total de Envíos</h5>
                            <p class="card-text">1200</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm pt-3 pb-3 mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios Activos</h5>
                            <p class="card-text">300</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm pt-3 pb-3 mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos Pendientes</h5>
                            <p class="card-text">45</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm pt-3 pb-3 mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos Pendientes</h5>
                            <p class="card-text">45</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm pt-3 pb-3 mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos Pendientes</h5>
                            <p class="card-text">45</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm pt-3 pb-3 mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos Pendientes</h5>
                            <p class="card-text">45</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<br>

<!-- Pie de página con nuevo gradiente -->
<footer class="text-white text-center py-3 mt-5" style="background: linear-gradient(to right, #212b59, #fbea90, #915d18);">
    <p>&copy; 2024 Servitel. Todos los derechos reservados.</p>
</footer>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>