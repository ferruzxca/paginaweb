<?php
session_start();
require_once '../includes/conexion.php';
require_once 'includes/auth.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE menu SET activo = 0 WHERE id = ?");
$stmt->execute([$id]);

header("Location: admin_menu.php");
exit;
