<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="public/css/interface.css">
</head>
<body>
    <div class="auth-box">
        <h2>Login</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="index.php?action=login">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="index.php?action=register">Register here</a></p>

        <form method="POST" action="index.php?action=guest">
            <input type="hidden" name="guest" value="1">
            <button type="submit">Continue as Guest</button>
        </form>
    </div>
</body>
</html>
