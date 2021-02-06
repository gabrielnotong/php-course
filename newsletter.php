<?php 
    $title = 'News Letter';
    $active = 'newsletter';
    $error = $email = $success = null;

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';
            file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
            $success = 'Votre email a bien été enregistré !';
            $email = null;
        } else {
            $error = 'Email invalide';
        }
    }

    require 'elements/header.php'; 
?>
<h1 class="header">
    Register to the news letter
</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, ea asperiores assumenda delectus dolorem quasi ratione a maxime rerum officiis magnam, omnis deserunt ipsa voluptatem vitae fugiat non dolore iusto.</p>


<?php if ($error): ?>
    <div class="alert alert-danger mt-5">
        <h5><?= $error ?></h5>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="alert alert-success mt-5">
        <h5><?= $success ?></h5>
    </div>
<?php endif; ?>

<form action="/newsletter.php" method="post" class="form-inline">
    <div class="form-group">
        <input 
            type="email" 
            name="email" 
            placeholder="Enter your email" 
            class="form-control"
            value="<?= htmlentities($email) ?>" 
            required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php require 'elements/footer.php'; ?>