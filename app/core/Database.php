<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    public static function connect() {
        $host = "lx0hl.h.filess.io";
        $port = 3305;
        $dbname = "cosc4806_wholealoud";
        $user = "cosc4806_wholealoud";
        $pass = $_ENV['password'] ?? getenv('password');

        try {
            return new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
        }
    }
}
