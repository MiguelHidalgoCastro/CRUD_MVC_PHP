<?php
require_once 'config/config.php';
class Conexion
{

    public static function conectar()
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
