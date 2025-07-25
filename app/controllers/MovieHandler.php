<?php
namespace App\Controllers;

use App\Models\Film;
use App\Models\Rating;


    class MovieHandler {
        public function search() {
            $results = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
                $film = new Film();
                $results = $film->searchByTitle($_POST['title']);
            }
            include "app/views/motion/search.php";
        }

        public function details($imdbID) {
            $film = new Film();
            $rating = new Rating();

            $movie = $film->getById($imdbID);
            $avg = $rating->getAverage($imdbID);
            $userRating = null;

            if (isset($_SESSION['user_id'])) {
                $userRating = $rating->getUserRating($_SESSION['user_id'], $imdbID);
            }

            include "app/views/motion/details.php";
        }

        public function rate() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'], $_POST['imdb_id'])) {
                $rating = new Rating();
                $user_id = $_SESSION['user_id'] ?? null;
                if ($user_id) {
                    $rating->submit($user_id, $_POST['imdb_id'], $_POST['rating']);
                }
            }
            header("Location: index.php?action=details&id=" . urlencode($_POST['imdb_id']));
        }

        public function review($imdbID) {
            $film = new Film();
            $movie = $film->getById($imdbID);

            $desc = $movie['Title'] . " is a " . $movie['Genre'] . " movie directed by " . $movie['Director'] . ". Plot: " . $movie['Plot'];
            $prompt = "Write a short and engaging AI-generated movie review for the following description:\n\n$desc";

            $response = $this->generateAIReview($prompt);

            
            $html = nl2br($response);
            $html = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $html);

            echo "<div class='review-box'>
                    <h3>🎥 AI Review</h3>
                    <p>$html</p>
                    <a href='index.php?action=details&id=$imdbID'>⬅ Back</a>
                  </div>";
        }


        private function generateAIReview($prompt) {
            $key = $_ENV['gemini'] ?? getenv('gemini');
            $body = json_encode([
                'contents' => [[ 'parts' => [[ 'text' => $prompt ]] ]]
            ]);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://generativelanguage.googleapis.com/v1/models/gemini-2.0-flash:generateContent?key=$key");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

            $response = curl_exec($ch);
            curl_close($ch);

            $json = json_decode($response, true);

            if (isset($json['candidates'][0]['content']['parts'][0]['text'])) {
                return $json['candidates'][0]['content']['parts'][0]['text'];
            }

            if (isset($json['error']['message'])) {
                return "Gemini API error: " . $json['error']['message'];
            }

            return "Review generation failed.";
        }
    }
