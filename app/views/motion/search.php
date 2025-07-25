<!DOCTYPE html>
<html>
<head>
    <title>Search Movies</title>
    <link rel="stylesheet" href="public/css/interface.css">
</head>
<body>
    <div class="container">
        <h2>Search Movies</h2>
        <form method="POST" action="index.php?action=search">
            <input type="text" name="title" placeholder="Enter movie title" required>
            <button type="submit">Search</button>
        </form>

        <?php if (!empty($results)): ?>
            <div class="results">
                <h3>Results:</h3>
                <ul>
                    <?php foreach ($results as $movie): ?>
                        <li>
                            <img src="<?= htmlspecialchars($movie['Poster']) ?>" alt="Poster" width="50">
                            <?= htmlspecialchars($movie['Title']) ?> (<?= $movie['Year'] ?>)
                            <a href="index.php?action=details&id=<?= urlencode($movie['imdbID']) ?>">View</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=logout">
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>
