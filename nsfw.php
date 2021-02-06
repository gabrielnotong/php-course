<?php
if (!empty($_POST['age'])) {
    setcookie('age', $_POST['age']);
    $_COOKIE['age'] = $_POST['age'];
}

$age = (int)($_COOKIE['age'] ?? date('Y'));
$hasAtLeast18Years = ((int)date('Y') - $age) >= 18;

require 'elements/header.php';
?>

<?php if ($hasAtLeast18Years): ?>
    <h1 class="text-success">Voici le contenu un peu holé holé</h1>
<?php else: ?>
    <div class="alert alert-danger">
        <h2>Vous êtes très jeune pour voir ce contenu !</h2>
    </div>
<?php endif; ?>

<form method="post">
    <div class="form-group">
        <h5>Quelle est votre année de naissance ?</h5>
        <select name="age">
            <?php for($i = 2010; $i >= 1919; $i--): ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
<?php require 'elements/footer.php'; ?>