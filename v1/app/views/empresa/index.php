<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Empresarial</title>
    <!-- Vincula el archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light" style="background-image: url('../../../assets/imagenes/Fondo3.webp'); background-size: cover; background-position: center; background-attachment: fixed;">


    <div class="container bg-white bg-opacity-75 p-4 rounded shadow-lg" style="max-width: 600px; width: 100%;"> 

        <h1 class="text-center mb-4" style="color: #2c3e50;">Ingreso Empresarial</h1>

        <!-- Logo de la empresa (oculto hasta que se seleccione una empresa) -->
        <div id="companyLogo" class="mb-4 text-center" style="display: none;">
            <img id="logo" src="" alt="Logo Empresa" class="img-fluid" style="max-width: 150px;">
        </div>

        <form action="index.php?C=LoginController&A=login" method="POST" id="loginForm">
            <!-- Dropdown para seleccionar la empresa -->
            <div class="mb-3">
                <label for="companySelect" class="form-label">Seleccionar Empresa:</label>
                <select id="companySelect" class="form-select" name="empresa" required>
                    <option value="">Seleccione una empresa</option>
                    <option value="1">Servientrega</option>
                    <option value="2">Servitel</option>
                    <option value="3">Global</option>
                </select>
            </div>

            <!-- Formulario de login -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="email" name="email" required aria-label="Correo">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required aria-label="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Ingresar</button>
        </form>

    </div>

    <!-- Bootstrap y JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        // Cambiar el formulario y logo según la empresa seleccionada
        function updateLoginForm() {
            const companySelect = document.getElementById("companySelect");
            const companyLogo = document.getElementById("companyLogo");
            const logoImg = document.getElementById("logo");

            const selectedCompany = companySelect.value;

            // Si no se ha seleccionado una empresa, no mostramos el logo
            if (selectedCompany === "") {
                companyLogo.style.display = "none";  // Ocultar el logo
            } else {
                companyLogo.style.display = "block";  // Mostrar el logo
                switch(selectedCompany) {
                    case '1':
                        logoImg.src = '/login_multitenant/assets/imagenes/logo_servientrega.png';  // Ruta absoluta
                        logoImg.alt = 'Logo Servientrega';
                        break;
                    case '2':
                        logoImg.src = '/login_multitenant/assets/imagenes/logo_servitel.png';  // Ruta absoluta
                        logoImg.alt = 'Logo Servitel';
                        break;
                    case '3':
                        logoImg.src = '/login_multitenant/assets/imagenes/logo_global.png';  // Ruta absoluta
                        logoImg.alt = 'Logo Global';
                        break;
                }
            }
        }

        // Llamar a la función cuando se cambie la selección del "select"
        document.getElementById('companySelect').addEventListener('change', updateLoginForm);

        // También llamamos la función para mostrar el logo inicial si ya se ha seleccionado una opción
        updateLoginForm();
    </script>
</body>
</html>
