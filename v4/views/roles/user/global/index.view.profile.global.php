<?php 
    // Asegúrate de que el usuario esté autenticado
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['empresa_id']) || !isset($_SESSION['role'])) {
        header('Location: ?c=LoginCtlr&a=main'); // Si no está autenticado, redirige al login
        exit();
    }

    // Verifica si el rol no es 2 (asegurando que sea int)
    if ($_SESSION['role'] !== 2) {
        header('Location: ?c=LoginCtlr&a=main'); // Si no es el rol 2, redirige al login
        exit();
    }

    // Verifica si la empresa_id no es "3" (asegurando que sea string)
    if ($_SESSION['empresa_id'] !== '3') {
        header('Location: ?c=LoginCtlr&a=main'); // Si no es la empresa 3, redirige al login
        exit();
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Cédula</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para el gradiente en el card */
        .card-header {
            background: linear-gradient(to right, #212b59, #fbea90, #915d18);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Card del perfil -->
        <div class="card mx-auto" style="max-width: 1000px;">
            <div class="card-header text-center">
                <h4 class="text-dark">Perfil de Usuario (<?php echo ($_SESSION['empresa_id'] == 1) ? 'Servientrega' : ($_SESSION['empresa_id'] == 2 ? 'Servitel' : ($_SESSION['empresa_id'] == 3 ? 'Global' : 'Empresa desconocida')); ?>)</h4>
            </div>
            <div class="card-body">
                <!-- Estructura para PC: Foto a la izquierda y 2 columnas con datos -->
                <div class="row d-none d-md-flex">
                    <!-- Foto de perfil (a la izquierda) -->
                    <div class="col-md-4 d-flex justify-content-center pt-5">
                        <img src="https://via.placeholder.com/150" alt="Foto de perfil" class="rounded-circle border border-primary" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Primer conjunto de 6 datos (en columnas) -->
                            <div class="col-md-6 mb-3">
                                <p><strong>Tipo de Documento:</strong> <?php print_r($_SESSION['tipo_doc_usu']); ?> </p>
                                <p><strong>Número de Documento:</strong> <?php print_r($_SESSION['num_doc_usu']); ?> </p>
                                <p><strong>Nombres:</strong> <?php print_r($_SESSION['nombre_usu']); ?> </p>
                                <p><strong>Apellidos:</strong> <?php print_r($_SESSION['apellidos_usu']); ?> </p>
                                <p><strong>Teléfono:</strong> <?php print_r($_SESSION['telefono_usu']); ?> </p>
                                
                            </div>
                            <!-- Segundo conjunto de datos -->
                            <div class="col-md-6 mb-3">
                                <p><strong>Correo:</strong> <?php print_r($_SESSION['correo_usu']); ?> </p>
                                <p><strong>Rol:</strong> <?php echo ($_SESSION['role'] == 1) ? 'Administrador' : ($_SESSION['role'] == 2 ? '2 - Colaborador' : 'Rol desconocido'); ?> </p>
                                <p><strong>Cargo:</strong> <?php print_r($_SESSION['cargo']); ?> </p>
                                <p><strong>Empresa:</strong> <?php echo ($_SESSION['empresa_id'] == 1) ? 'Servientrega' : ($_SESSION['empresa_id'] == 2 ? 'Servitel' : ($_SESSION['empresa_id'] == 3 ? 'Global' : 'Empresa desconocida')); ?> </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- En móvil, todo se verá en una sola columna -->
                <div class="row d-md-none">
                    <div class="col-12 d-flex justify-content-center mb-4">
                        <img src="https://via.placeholder.com/150" alt="Foto de perfil" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <!-- Primer conjunto de datos (móvil) -->
                            <div class="col-12 mb-3">
                                <p><strong>Tipo de Documento:</strong> <?php print_r($_SESSION['tipo_doc_usu']); ?></p>
                                <p><strong>Número de Documento:</strong> <?php print_r($_SESSION['num_doc_usu']); ?></p>
                                <p><strong>Nombres:</strong> <?php print_r($_SESSION['nombre_usu']); ?></p>
                                <p><strong>Apellidos:</strong> <?php print_r($_SESSION['apellidos_usu']); ?></p>
                                <p><strong>Teléfono:</strong> <?php print_r($_SESSION['telefono_usu']); ?></p>
                                
                            </div>
                            <!-- Segundo conjunto de datos (móvil) -->
                            <div class="col-12 mb-3">
                                <p><strong>Correo:</strong> <?php print_r($_SESSION['correo_usu']); ?></p>
                                <p><strong>Rol:</strong> <?php echo ($_SESSION['role'] == 1) ? 'Administrador' : ($_SESSION['role'] == 2 ? '2 - Colaborador' : 'Rol desconocido'); ?></p>
                                <p><strong>Cargo:</strong> <?php print_r($_SESSION['cargo']); ?></p>
                                <p><strong>Empresa:</strong> <?php echo ($_SESSION['empresa_id'] == 1) ? 'Servientrega' : ($_SESSION['empresa_id'] == 2 ? 'Servitel' : ($_SESSION['empresa_id'] == 3 ? 'Global' : 'Empresa desconocida')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón de Cerrar sesión -->
                <div class="d-flex justify-content-center mt-4">
                    <a href="?c=LoginCtlr&a=logOut" class="btn btn-danger">Cerrar sesión</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
