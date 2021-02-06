<?php
session_start();
$_SESSION['role'] = 'admin';
$_SESSION['role'] = 'copier';

$title = 'Home page';
$active = 'index';
require 'elements/header.php';
?>

<div id="container">
    <section class="jumbotron">
        <header>The index page</header>
    </section>
</div>

<?php require 'elements/footer.php'; ?>