<?php
// controllers/Dashboard.php

class Dashboard {
    public function show() {
        session_start();
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            // Mostrar dashboard según el rol
            include "views/dashboard/dashboard.php";  // Asume que tienes una vista llamada dashboard.php
        } else {
            header("Location: views/landing/login.php?error=2");
        }
    }
}
?>
