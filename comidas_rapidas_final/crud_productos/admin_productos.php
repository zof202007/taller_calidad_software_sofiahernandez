<?php
session_start();
require_once "../includes/db.php";

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login/login.php");
    exit();
}

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
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="/comidas_rapidas_final/css/productos.css">
</head>
<body>

<div class="container">

<h2>Productos</h2>

<a href="create_producto.php">➕ Agregar Producto</a><br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>

<?php foreach ($productos as $p): ?>
<tr>
    <td><?= $p["id"] ?></td>
    <td><?= $p["nombre"] ?></td>
    <td><?= $p["nombre_tipo"] ?></td>
    <td>$<?= $p["precio"] ?></td>
    <td>
        <img src="../images/<?= $p["imagen"] ?>" width="50" alt="Imagen del producto <?= $p["nombre"] ?>">
    </td>
    <td>
        <a href="edit_producto.php?id=<?= $p["id"] ?>">Editar</a> |
        <a href="delete_producto.php?id=<?= $p["id"] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<br>
<a href="../admin/dashboard.php">⬅ Panel</a>

</div>

</body>
</html>

<?php endforeach; ?>
</table>

<br>
<a href="../admin/dashboard.php">⬅ Panel</a>
