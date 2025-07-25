<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($movie['Title']) ?> - Details</title>
    <link rel="stylesheet" href="public/css/interface.css">
</head>
<body>
    <div class="container">
        <h2><?= htmlspecialchars($movie['Title']) ?> (<?= htmlspecialchars($movie['Year']) ?>)</h2>

        <div class="movie-details">
            <img src="<?= htmlspecialchars($movie['Poster']) ?>" alt="Poster" width="200">
            <p><strong>Genre:</strong> <?= htmlspecialchars($movie['Genre']) ?></p>
            <p><strong>Director:</strong> <?= htmlspecialchars($movie['Director']) ?></p>
            <p><strong>Plot:</strong> <?= htmlspecialchars($movie['Plot']) ?></p>
            <p><strong>IMDb Rating:</strong> <?= htmlspecialchars($movie['imdbRating']) ?>/10</p>
            <p><strong>Average User Rating:</strong> <?= $avg ?? "Not yet rated" ?>/5</p>

            <?php if (isset($_SESSION['user_id'])): ?>
                <form method="POST" action="index.php?action=rate">
                    <input type="hidden" name="imdb_id" value="<?= htmlspecialchars($movie['imdbID']) ?>">
                    <label for="rating">Your Rating (1-5):</label>
                    <select name="rating" required>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <option value="<?= $i ?>" <?= ($userRating == $i) ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <button type="submit">Submit</button>
                </form>
            <?php else: ?>
                <p><em>Login to rate this movie.</em></p>
            <?php endif; ?>

            <form method="GET" action="index.php">
                <input type="hidden" name="action" value="review">
                <input type="hidden" name="id" value="<?= htmlspecialchars($movie['imdbID']) ?>">
                <button type="submit">🤖 Get AI Review</button>
            </form>

            <br>
            <a href="index.php?action=search">⬅ Back to Search</a>
        </div>
    </div>
</body>
</html>
