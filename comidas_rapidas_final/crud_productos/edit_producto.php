<link rel="stylesheet" href="/comidas_rapidas_final/css/productos.css">
<div class="container">
<?php
require "../includes/db.php";

$id = $_GET["id"];
$p = $pdo->prepare("SELECT * FROM productos WHERE id=?");
$p->execute([$id]);
$producto = $p->fetch();

$tipos = $pdo->query("SELECT * FROM tipos")->fetchAll();

if ($_POST) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $tipo = $_POST["tipo_id"];

    $sql = $pdo->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, tipo_id=? WHERE id=?");
    $sql->execute([$nombre, $descripcion, $precio, $tipo, $id]);

    header("Location: admin_productos.php");
}
?>

<h2>Editar Producto</h2>

<form method="POST">
    <input type="text" name="nombre" value="<?= $producto["nombre"] ?>" required><br><br>
    <textarea name="descripcion"><?= $producto["descripcion"] ?></textarea><br><br>
    <input type="number" step="0.01" name="precio" value="<?= $producto["precio"] ?>" required><br><br>

    <select name="tipo_id">
        <?php foreach ($tipos as $t): ?>
            <option value="<?= $t["id"] ?>" <?= $t["id"] == $producto["tipo_id"] ? 'selected' : '' ?>>
                <?= $t["nombre_tipo"] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>

<a href="admin_productos.php">⬅ Volver</a>
