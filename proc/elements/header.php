<?php 
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions.php';
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title: 'Mon site'  ?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="/index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <ul class="navbar-nav mr-auto">
                <?= navMenu('nav-link') ?>
            </ul>
            <ul class="navbar-nav">
                <?php if(isAuthenticated()): ?>
                <li class="nav-item"><a class="nav-link" href="/logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>