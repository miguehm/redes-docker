<?php
$host = 'db'; // El nombre del servicio de MariaDB en docker-compose
$db   = 'proyecto_docker';
$user = 'usuario';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "Conexión establecida correctamente 🎉";
} catch (PDOException $e) {
     echo "Error en la conexión: " . $e->getMessage();
}

echo "<p>La fecha actual es: " . date('Y-m-d H:i:s') . "</p>";
