<?php
require_once "../includes/db.php";

$id = $_GET["id"];

$tipo = $pdo->prepare("SELECT * FROM tipos WHERE id=?");
$tipo->execute([$id]);
$tipo = $tipo->fetch();

if ($_POST) {
    $nombre = $_POST["nombre"];

    $sql = $pdo->prepare("UPDATE tipos SET nombre_tipo=? WHERE id=?");
    $sql->execute([$nombre, $id]);

    header("Location: index.php");
    exit();
}
?>

<link rel="stylesheet" href="/comidas_rapidas_final/css/tipos.css">
<div class="container">

<h2>Editar Tipo</h2>

<form method="POST">
    <input type="text" name="nombre" value="<?= $tipo["nombre_tipo"]; ?>" required>
    <br><br>
    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php">⬅ Volver</a>

</div>

<a href="index.php">⬅ Volver</a>
