<?php
session_start();
require_once '../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_user'] = $admin['username'];
        header("Location: dashboard.php");
        exit;
    }
    else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: login_admin.php");
        exit;
    }
} else {
    header("Location: login_admin.php");
    exit;
}
