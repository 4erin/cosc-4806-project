<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/interface.css">
</head>
<body>
    <div class="auth-box">
        <h2>📝 Register</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="index.php?action=register">
            <input type="text" name="username" placeholder="Choose a Username" required><br>
            <input type="password" name="password" placeholder="Choose a Password" required><br>
            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="index.php?action=login">Login here</a></p>
    </div>
</body>
</html>
