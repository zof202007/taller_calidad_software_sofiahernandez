<?php
require_once "../includes/db.php";

$tipos = $pdo->query("SELECT * FROM tipos")->fetchAll();

if ($_POST) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $tipo = $_POST["tipo_id"];

    $imagen = $_FILES["imagen"]["name"];
    $ruta = "../images/" . $imagen;
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    $sql = $pdo->prepare("INSERT INTO productos (nombre, descripcion, precio, imagen, tipo_id) VALUES (?,?,?,?,?)");
    $sql->execute([$nombre, $descripcion, $precio, $imagen, $tipo]);

    header("Location: admin_productos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="/comidas_rapidas_final/css/productos.css">
</head>
<body>

<div class="container">

<h2>Nuevo Producto</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre" required><br><br>
    <textarea name="descripcion" placeholder="Descripción"></textarea><br><br>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required><br><br>

    <select name="tipo_id" required>
        <option value="">Seleccione Tipo</option>
        <?php foreach ($tipos as $t): ?>
            <option value="<?= $t["id"] ?>"><?= $t["nombre_tipo"] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="file" name="imagen" required><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="admin_productos.php">⬅ Volver</a>

</div>

</body>
</html>
<a href="admin_productos.php">⬅ Volver</a>
