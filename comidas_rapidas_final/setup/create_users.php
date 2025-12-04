<?php
require __DIR__ . '/../includes/db.php';

// Users to create (change here if you want other names/passwords)
$users = [
    ['rol' => 'admin', 'usuario' => 'valentina', 'password' => '12345'],
    ['rol' => 'cliente', 'usuario' => 'cliente1', 'password' => '12345']
];

foreach ($users as $u) {
    // delete if exists
    $pdo->prepare('DELETE FROM usuarios WHERE usuario = ?')->execute([$u['usuario']]);
    $hash = password_hash($u['password'], PASSWORD_BCRYPT);
    $pdo->prepare('INSERT INTO usuarios (rol, usuario, password) VALUES (?, ?, ?)')->execute([$u['rol'], $u['usuario'], $hash]);
}

echo 'Usuarios creados: admin=valentina (12345), cliente=cliente1 (12345)';
?>
