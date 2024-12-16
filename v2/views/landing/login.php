<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Empresarial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light" style="background-image: url('assets/imagenes/Fondo3.webp'); background-size: cover; background-position: center; background-attachment: fixed;">

    <div class="container bg-white bg-opacity-75 p-4 rounded shadow-lg" style="max-width: 600px; width: 100%;">
        <h1 class="text-center mb-4" style="color: #2c3e50;">Ingreso Empresarial</h1>
        <!-- Logo de la empresa (oculto hasta que se seleccione una empresa) -->
        <div id="companyLogo" class="mb-4 text-center" style="display: none;">
            <!-- Aquí agregamos un tamaño máximo específico para los logos -->
            <img src="assets/imagenes/logo_servientrega.png" alt="Logo Servientrega" class="img-fluid" style="max-width: 150px; height: auto;">
        </div>

        <!-- Formulario de login -->
        <form action="index.php?c=Users&a=login" method="POST" id="loginForm">
            <!-- Dropdown para seleccionar la empresa -->
            <div class="mb-3">
                <label for="companySelect" class="form-label">Seleccionar Empresa:</label>
                <select id="companySelect" class="form-select" name="empresa_id" onchange="updateLoginForm()">
                    <option value="">Seleccione una empresa</option>
                    <option value="2">Servientrega</option>
                    <option value="1">Servitel</option>
                    <option value="3">Global</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Ingresar</button>
            <div class="d-flex justify-content-between">
                <a href="#" class="text-muted">Olvidé mi contraseña</a>
            </div>
        </form>
        <?php if (isset($error_message)): ?>
    <div class="alert alert-danger">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        // Cambiar el formulario y logo según la empresa seleccionada
        function updateLoginForm() {
            const companySelect = document.getElementById("companySelect");
            const companyLogo = document.getElementById("companyLogo");

            const selectedCompany = companySelect.value;

            // Si no se ha seleccionado una empresa, no mostramos el logo
            if (selectedCompany === "") {
                companyLogo.style.display = "none";  // Ocultar el logo
            } else {
                companyLogo.style.display = "block";  // Mostrar el logo
                switch(selectedCompany) {
                    case '1':
                        companyLogo.innerHTML = '<img src="assets/imagenes/logo_servientrega.png" alt="Logo Servientrega" class="img-fluid" style="max-width: 150px; height: auto;">';
                        break;
                    case '2':
                        companyLogo.innerHTML = '<img src="assets/imagenes/logo_servitel.png" alt="Logo Empresa 2" class="img-fluid" style="max-width: 150px; height: auto;">';
                        break;
                    case '3':
                        companyLogo.innerHTML = '<img src="assets/imagenes/logo_global.png" alt="Logo Empresa 3" class="img-fluid" style="max-width: 150px; height: auto;">';
                        break;
                }
            }
        }

        // Llamar a la función para inicializar el formulario sin logo visible
        updateLoginForm();
    </script>
</body>
</html>
