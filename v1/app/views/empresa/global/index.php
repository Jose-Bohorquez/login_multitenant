<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Global</title>
</head>
<body>
    <h1>Ingreso a Global</h1>
    <form action="index.php?C=EmpresaController&A=procesarLogin" method="POST">
        <input type="hidden" name="empresa" value="1"> <!-- Empresa Global -->
        
        <label for="username">Usuario:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
