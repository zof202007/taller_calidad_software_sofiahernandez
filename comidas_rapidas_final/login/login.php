<?php
session_start();
require "../includes/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
    $sql->execute([$usuario, $password]);
    $user = $sql->fetch();

    if ($user) {
        $_SESSION["usuario"] = $user["usuario"];
        $_SESSION["rol"] = $user["rol"];
        header("Location: ../admin/dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="/comidas_rapidas_final/css/login.css">
</head>
<body>

<div class="login-box">
    <h2>Login Administrador</h2>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
</div>

</body>
</html>


