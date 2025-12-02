<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel Administrador</title>
    <link rel="stylesheet" href="/comidas_rapidas_final/css/dashboard.css">
</head>
<body>

<div class="dashboard">
    <h1>Panel del Administrador</h1>

    <div class="cards">

        <div class="card">
            <h2>Tipos de Productos</h2>
            <p>Crear, editar y eliminar tipos.</p>
            <a href="/comidas_rapidas_final/crud_tipos/index.php">Ir</a>
        </div>

        <div class="card">
            <h2>Productos</h2>
            <p>Gestionar productos del negocio.</p>
            <a href="/comidas_rapidas_final/crud_productos/admin_productos.php">Ir</a>
        </div>

        <div class="card">
            <h2>Ver Página Principal</h2>
            <p>Ver el catálogo de productos.</p>
            <a href="/comidas_rapidas_final/index.php">Ver</a>
        </div>

    </div>

    <div class="logout">
        <br>
        <a href="../login/logout.php">Cerrar Sesión</a>
    </div>
</div>

</body>
</html>

