<?php
require "../includes/db.php";

$id = $_GET["id"];
$pdo->prepare("DELETE FROM productos WHERE id=?")->execute([$id]);

header("Location: admin_productos.php");

