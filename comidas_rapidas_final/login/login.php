<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Comidas Rápidas</title>
  <link rel="stylesheet" href="/comidas_rapidas_final/css/style.css">
</head>
<body>

<header class="site-header">
  <div class="container">
    <h1><a href="/comidas_rapidas_final/index.php">Comidas Rápidas</a></h1>

    <nav>
      <a href="/comidas_rapidas_final/index.php">Inicio</a>

      <?php if (isset($_SESSION["usuario"])) { ?>

          <?php if ($_SESSION["rol"] === "admin") { ?>
              <a href="/comidas_rapidas_final/crud_productos/admin_productos.php">Productos</a>
              <a href="/comidas_rapidas_final/crud_tipos/admin_tipos.php">Tipos</a>
          <?php } ?>

          <a href="/comidas_rapidas_final/login/logout.php">
            Salir (<?php echo htmlspecialchars($_SESSION["usuario"]); ?>)
          </a>

      <?php } else { ?>

          <a href="/comidas_rapidas_final/login/login.php">Login</a>

      <?php } ?>
    </nav>

  </div>
</header>

<main class="container">


