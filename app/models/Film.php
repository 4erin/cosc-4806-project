<?php
namespace App\Models;

class Film {
    private $apiKey;

    public function __construct() {
        $this->apiKey = $_ENV['omdb'] ?? getenv('omdb');
    }

    public function searchByTitle($title) {
        $title = urlencode($title);
        $url = "http://www.omdbapi.com/?apikey={$this->apiKey}&s=$title&type=movie";

        $json = file_get_contents($url);
        $data = json_decode($json, true);

        return $data['Search'] ?? [];
    }

    public function getById($imdbID) {
        $url = "http://www.omdbapi.com/?apikey={$this->apiKey}&i=$imdbID&plot=full";

        $json = file_get_contents($url);
        $data = json_decode($json, true);

        return $data;
    }
}
