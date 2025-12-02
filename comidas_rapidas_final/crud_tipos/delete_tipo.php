<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['rol']!=='admin'){ header('Location: /comidas_rapidas_final/login/login.php'); exit; }
require __DIR__ . '/../includes/db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $id = intval($_POST['id'] ?? 0);
  if($id>0){
    $stmt = $pdo->prepare('DELETE FROM tipos WHERE id = ?'); $stmt->execute([$id]);
  }
}
header('Location: admin_tipos.php'); exit;
