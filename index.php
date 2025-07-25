<?php
session_start();

// ✅ Autoloader — fix for lowercase folders like 'controllers', 'models', etc.
spl_autoload_register(function ($class) {
    if (str_starts_with($class, 'App\\')) {
        $class = substr($class, 4); // Remove App\
    }

    $parts = explode('\\', $class);
    $parts[0] = strtolower($parts[0]); // lowercase 'Controllers', 'Models', etc.

    $path = implode('/', $parts);
    require_once __DIR__ . '/app/' . $path . '.php';
});


// ✅ Use proper case-sensitive namespace references
use App\Controllers\AController;
use App\Controllers\MovieHandler;

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        (new AController())->login();
        break;
    case 'register':
        (new AController())->register();
        break;
    case 'logout':
        (new AController())->logout();
        break;
    case 'guest':
        $_SESSION['guest'] = true;
        header("Location: index.php?action=search");
        break;
    case 'search':
        (new MovieHandler())->search();
        break;
    case 'details':
        (new MovieHandler())->details($_GET['id'] ?? '');
        break;
    case 'rate':
        (new MovieHandler())->rate();
        break;
    case 'review':
        (new MovieHandler())->review($_GET['id'] ?? '');
        break;
    default:
        header("Location: index.php?action=login");
}
