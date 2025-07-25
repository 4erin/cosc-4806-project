<?php
namespace app\controllers;

use app\models\User;

class AController {
    public function login() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $id = $user->validate($_POST['username'], $_POST['password']);
            if ($id) {
                $_SESSION['user_id'] = $id;
                unset($_SESSION['guest']);
                header("Location: index.php?action=search");
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        }
        include "app/views/auth/login.php";
    }

    public function register() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $success = $user->create($_POST['username'], $_POST['password']);
            if ($success) {
                header("Location: index.php?action=login");
                exit;
            } else {
                $error = "Username already exists.";
            }
        }
        include "app/views/auth/register.php";
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
    }
}
