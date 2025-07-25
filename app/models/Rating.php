<?php
namespace app\Models;

use app\Core\Database;
use PDO;

class Rating {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function submit($user_id, $imdb_id, $rating) {
        $existing = $this->getUserRating($user_id, $imdb_id);

        if ($existing !== null) {
            $stmt = $this->db->prepare("UPDATE ratings SET rating = ? WHERE user_id = ? AND imdb_id = ?");
            $stmt->execute([$rating, $user_id, $imdb_id]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO ratings (user_id, imdb_id, rating) VALUES (?, ?, ?)");
            $stmt->execute([$user_id, $imdb_id, $rating]);
        }
    }

    public function getAverage($imdb_id) {
        $stmt = $this->db->prepare("SELECT AVG(rating) as avg FROM ratings WHERE imdb_id = ?");
        $stmt->execute([$imdb_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return round($result['avg'], 1);
    }

    public function getUserRating($user_id, $imdb_id) {
        $stmt = $this->db->prepare("SELECT rating FROM ratings WHERE user_id = ? AND imdb_id = ?");
        $stmt->execute([$user_id, $imdb_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['rating'] : null;
    }
}
