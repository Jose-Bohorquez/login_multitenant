<?php
// Iniciar sesión
session_start();

// Asegurarse de que el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirigir al login
    header("Location: login.php");
    exit();
}

// Obtener los datos de la sesión
$user_name = $_SESSION['user_name']; // Nombre completo del usuario
$user_email = $_SESSION['user_email'] ?? 'No disponible'; // Correo del usuario
$user_role = $_SESSION['user_role']; // Rol del usuario
$empresa_id = $_SESSION['empresa_id']; // ID de la empresa
$empresa_name = getEmpresaName($empresa_id); // Función para obtener el nombre de la empresa
$creation_date = $_SESSION['creation_date'] ?? 'No disponible'; // Fecha de creación
$last_login = $_SESSION['last_login'] ?? 'No disponible'; // Último ingreso
$last_update = $_SESSION['last_update'] ?? 'No disponible'; // Última actualización
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuario</title>
  <!-- Enlace a Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJzXxB3c9R11t9M02CdKDFtTstjh3XcF5iQ3CbJw5esl84Q+K6kB5S54J8lz" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- Card para el perfil -->
        <div class="card">
          <div class="card-header text-center">
            <h2>Perfil de Usuario</h2>
          </div>
          <div class="card-body">
            <!-- Foto de perfil (por ahora se muestra un avatar) -->
            <div class="row mb-3">
              <div class="col-12 text-center">
                <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Avatar" width="150">
              </div>
            </div>
            <!-- Datos del Usuario -->
            <h4 class="mb-4">Información General</h4>
            <ul class="list-group">
              <li class="list-group-item"><strong>Nombre:</strong> <?php echo htmlspecialchars($user_name); ?></li>
              <li class="list-group-item"><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($user_email); ?></li>
              <li class="list-group-item"><strong>Cargo:</strong> <?php echo htmlspecialchars($user_role); ?></li>
            </ul>

            <h4 class="mt-4 mb-4">Empresa</h4>
            <ul class="list-group">
              <li class="list-group-item"><strong>Empresa:</strong> <?php echo htmlspecialchars($empresa_name); ?></li>
              <li class="list-group-item"><strong>URL de Empresa:</strong> <a href="#">www.<?php echo strtolower($empresa_name); ?>.com</a></li>
            </ul>

            <h4 class="mt-4 mb-4">Fechas</h4>
            <ul class="list-group">
              <li class="list-group-item"><strong>Fecha de Creación:</strong> <?php echo htmlspecialchars($creation_date); ?></li>
              <li class="list-group-item"><strong>Último Ingreso:</strong> <?php echo htmlspecialchars($last_login); ?></li>
              <li class="list-group-item"><strong>Última Actualización:</strong> <?php echo htmlspecialchars($last_update); ?></li>
            </ul>
          </div>
          <!-- Footer de la tarjeta -->
          <div class="card-footer text-center">
            <a href="editar_perfil.php" class="btn btn-primary">Editar Perfil</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Enlace a Bootstrap 5 JS y Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB1s0gZ5c93aAwwhaGTmHJwR5BXST6b5x9SyqkIWs5d0H6w5" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0u7t2V7bXl0IzH5l4OGz8yBR6fu13dUgt3rI8ZyxVmfi3hJd" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Función para obtener el nombre de la empresa según el ID de la empresa
function getEmpresaName($empresa_id) {
    // Dependiendo de la lógica de tu sistema, puedes obtener el nombre de la empresa
    // desde la base de datos. Aquí, simplemente usaremos ejemplos estáticos.
    switch ($empresa_id) {
        case 1:
            return "Servientrega";
        case 2:
            return "Servitel";
        case 3:
            return "Global";
        default:
            return "No disponible";
    }
}
?>
