<?php
require_once "includes/db.php";

$sql = $pdo->query("
    SELECT productos.*, tipos.nombre_tipo 
    FROM productos 
    INNER JOIN tipos ON productos.tipo_id = tipos.id
");
$productos = $sql->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tienda de Comidas Rápidas</title>
  <link rel="stylesheet" href="/comidas_rapidas_final/css/index.css">
</head>
<body>

<h1>🍔 Fofia Burger</h1>

<div class="boton-login">
  <a href="/comidas_rapidas_final/login/login.php">Iniciar Sesión</a>
</div>

<div class="tienda">

  <?php foreach ($productos as $p): ?>

  <div class="card-producto">
    <img 
      src="images/<?= $p["imagen"] ?>" 
      alt="Producto <?= htmlspecialchars($p["nombre"]) ?>"
    >

    <div class="contenido">
      <h3><?= $p["nombre"] ?></h3>
      <p><?= $p["descripcion"] ?></p>
      <p><b><?= $p["nombre_tipo"] ?></b></p>
      <div class="precio">$<?= $p["precio"] ?></div>
      <a href="#" class="btn-comprar">Comprar</a>
    </div>
  </div>

  <?php endforeach; ?>

</div>

</body>
</html>

