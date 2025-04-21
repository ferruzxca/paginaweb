<?php
// Zona horaria y codificación
date_default_timezone_set('America/Mexico_City');

// Parámetros de conexión para InfinityFree
define('DB_HOST', 'sql205.infinityfree.com');      // Reemplaza con el host real que te da InfinityFree
define('DB_NAME', 'if0_38734605_solprof');        // Nombre real de tu base de datos
define('DB_USER', 'if0_38734605');                 // Usuario proporcionado por InfinityFree
define('DB_PASS', 'Ferr280112');                  // Tu contraseña real

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die('❌ Error de conexión: ' . $e->getMessage());
}
?>
