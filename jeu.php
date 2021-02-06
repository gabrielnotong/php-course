<?php
    $toGuess = 150;
    $value = $_POST['number'] ?? null;
    $error =  $success = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($value < $toGuess) {
            $error = 'Le nombre recherché est plus grand';
        } elseif ($value > $toGuess) {
            $error = 'Le nombre recherché est plus petit';
        } else {
            $success = "Bravo vous l'avez trouvé!";
        }
    }

    require 'elements/header.php';
?>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php elseif ($success): ?>
    <div class="alert alert-success">
        <h1><?= $success ?></h1>
    </div>
<?php endif ?>

<form action="/jeu.php" method="POST">
    <div class="form-group col-3">
        <input class="form-control" type="number" placeholder="entre 0 et 1000" name="number" value="<?= htmlentities($value) ?>">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Guess</button>
    </div>
</form>


<?php require 'elements/footer.php' ?>