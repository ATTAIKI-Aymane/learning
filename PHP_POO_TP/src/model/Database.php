<?php
namespace App\Model;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $dbFile = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'app.db';
            $dir = dirname($dbFile);

            if (!is_dir($dir)) {
                if (!mkdir($dir, 0777, true) && !is_dir($dir)) {
                    throw new \RuntimeException("Unable to create directory for database: $dir");
                }
            }

            $dsn = 'sqlite:' . $dbFile; // simple local sqlite for learning
            try {
                self::$pdo = new PDO($dsn);
            } catch (\PDOException $e) {
                throw new \RuntimeException("Failed to open SQLite database at $dbFile: " . $e->getMessage(), 0, $e);
            }

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // create a table if not exists for demo
            self::$pdo->exec("CREATE TABLE IF NOT EXISTS posts (id INTEGER PRIMARY KEY, title TEXT, body TEXT)");
            self::$pdo->exec("INSERT INTO posts(title,body) SELECT 'Hello','World' WHERE NOT EXISTS (SELECT 1 FROM posts)");
        }
        return self::$pdo;
    }
}