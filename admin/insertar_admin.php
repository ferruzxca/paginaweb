<?php
require_once '../includes/conexion.php';

// Borra cualquier usuario anterior para evitar duplicados
$pdo->exec("DELETE FROM admin");

// Usuarios a insertar
$usuarios = [
  ['username' => 'Eugenio', 'password' => password_hash('1958', PASSWORD_DEFAULT)],
  ['username' => 'Ferruzca', 'password' => password_hash('2812', PASSWORD_DEFAULT)]
];

foreach ($usuarios as $u) {
  $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
  $stmt->execute([$u['username'], $u['password']]);
}

echo "✅ Usuarios Eugenio y Ferruzca insertados correctamente con contraseña segura.";
