<?php 
require_once 'elements/header.php';
require_once 'functions/auth.php';

$error = null;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    if (loggedIn($_POST['username'], $_POST['password'])){
        header('Location: /index.php');
        exit();
    }
    $error = 'Bad credentials. Username or Password or both may not be correct. Please try again';
}

if (isAuthenticated()) {
    header('Location: /index.php');
    exit();
}

$username = $_POST['username'] ?? '';

?>

<div class="container mt-5">
    <h2 class="header">Login</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Enter your user name" value="<?= $username ?>">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>

<?php require_once 'elements/footer.php'; ?>
