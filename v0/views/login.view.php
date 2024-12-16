<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Empresarial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #companyLogo img {
            max-width: 200px;
            max-height: 150px;
            object-fit: contain;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light" style="background-image: url('assets/imagenes/Fondo3.webp'); background-size: cover; background-position: center; background-attachment: fixed;">

    <div class="container bg-white bg-opacity-75 p-4 rounded shadow-lg" style="max-width: 600px; width: 100%;">
        <h1 class="text-center mb-4" style="color: #2c3e50;">Ingreso Empresarial</h1>

        <!-- Logo de la empresa -->
        <div id="companyLogo" class="mb-4 text-center" style="display: none;">
            <img id="companyImage" src="" alt="Logo de la empresa" class="img-fluid">
        </div>

        <!-- Formulario de login -->
        <form method="POST" id="loginForm" action="?c=LoginCtlr&a=receivesFormLoginData">
            <div class="mb-3">
                <label for="companySelect" class="form-label">Seleccionar Empresa:</label>
                <select id="companySelect" name="empresa" class="form-select" onchange="updateLoginForm()" required>
                    <option value="">Seleccione una empresa</option>
                    <option value="1">Servientrega</option>
                    <option value="2">Servitel</option>
                    <option value="3">Global</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="username" name="correo_ing" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="pwd_ing" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Ingresar</button>
            <div class="d-flex justify-content-between">
                <a href="#" class="text-muted">Olvidé mi contraseña</a>
            </div>
        </form>

        <!-- Mostrar Modal si hay un mensaje -->
        <?php if (isset($_SESSION['login_message'])): ?>
            <div class="modal fade" id="loginMessageModal" tabindex="-1" aria-labelledby="loginMessageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginMessageModalLabel"><?php echo $_SESSION['login_message_type'] == 'success' ? 'Éxito' : 'Error'; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $_SESSION['login_message']; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Mostrar el modal cuando la página se carga
                var myModal = new bootstrap.Modal(document.getElementById('loginMessageModal'), {
                    keyboard: false
                });
                myModal.show();
            </script>

            <?php 
            // Limpiar el mensaje después de mostrarlo
            unset($_SESSION['login_message']);
            unset($_SESSION['login_message_type']);
            ?>
        <?php endif; ?>

    </div>

    <!-- Bootstrap y JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        // Cambiar el formulario y logo según la empresa seleccionada
        function updateLoginForm() {
            const companySelect = document.getElementById("companySelect");
            const companyLogo = document.getElementById("companyLogo");
            const companyImage = document.getElementById("companyImage");
            const selectedCompany = companySelect.value;

            if (selectedCompany === "") {
                companyLogo.style.display = "none";
            } else {
                companyLogo.style.display = "block";
                switch (selectedCompany) {
                    case '1':
                        companyImage.src = "assets/imagenes/logo_servientrega.png";
                        companyImage.alt = "Logo Servientrega";
                        break;
                    case '2':
                        companyImage.src = "assets/imagenes/logo_servitel.png";
                        companyImage.alt = "Logo Servitel";
                        break;
                    case '3':
                        companyImage.src = "assets/imagenes/logo_global.png";
                        companyImage.alt = "Logo Global";
                        break;
                }
            }
        }

        // Llamar a la función para inicializar el formulario sin logo visible
        updateLoginForm();
    </script>
</body>
</html>
