<?php
namespace App\Model;

use PDO;

class Post
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT id, title, body FROM posts ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT id, title, body FROM posts WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }
}