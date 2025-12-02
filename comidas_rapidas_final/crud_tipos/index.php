<link rel="stylesheet" href="/comidas_rapidas_final/css/tipos.css">
<div class="container">
<?php
session_start();
require "../includes/db.php";

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login/login.php");
    exit();
}

// eliminar
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $pdo->prepare("DELETE FROM tipos WHERE id=?")->execute([$id]);
    header("Location: index.php");
}
?>

<h2>Tipos de Productos</h2>

<a href="crear.php">➕ Agregar nuevo tipo</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

<?php
$tipos = $pdo->query("SELECT * FROM tipos");

foreach ($tipos as $tipo) {
    echo "<tr>";
    echo "<td>".$tipo["id"]."</td>";
    echo "<td>".$tipo["nombre_tipo"]."</td>";
    echo "<td>
            <a href='editar.php?id=".$tipo["id"]."'>Editar</a> |
            <a href='index.php?delete=".$tipo["id"]."' onclick='return confirm(\"¿Eliminar?\")'>Eliminar</a>
          </td>";
    echo "</tr>";
}
?>
</table>

<br><br>
<a href="../admin/dashboard.php">⬅ Volver al panel</a>
