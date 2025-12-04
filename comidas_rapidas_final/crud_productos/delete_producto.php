<?php
require_once "../includes/db.php";

if (!isset($_GET["id"])) {
    header("Location: admin_productos.php");
    exit();
}

$id = $_GET["id"];

$sql = $pdo->prepare("DELETE FROM productos WHERE id = ?");
$sql->execute([$id]);

header("Location: admin_productos.php");
exit();
?>
