<?php

function isAuthenticated(): bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['authenticated']);
}

function deniedAccessIfNotGranted(): void {
    if (!isAuthenticated()) {
        header('Location: /login.php');
        exit();
    }
}

function loggedIn(string $username, string $password): bool {
    if ($username === 'john' && $password === 'password') {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['authenticated'] = true;

        return true;
    }

    return false;
}

function loggout(): void {
    if (isAuthenticated()) {
        if (session_status() === PHP_SESSION_ACTIVE) {
            unset($_SESSION['authenticated']);
        }
    }
    header('Location: /');
    exit();
}