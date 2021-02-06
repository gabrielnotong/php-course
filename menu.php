<?php
    $title = "My menu";
    require_once "elements/header.php";
    require_once "functions.php";

    $filePath = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.tsv';

    $resource = fopen($filePath, 'r');

    $lines = [];
    $k = 0;
    while($line = fgets($resource)) {
        $lines[$k] = explode("  ",trim($line));
        $k++;
    }
    fclose($resource);
?>

<div class="container">
    <?php foreach($lines as $line): ?>
        <?php if (count($line) === 1): ?>
            <h2><?= $line[0] ?></h2>
        <?php else: ?>
            <div class="row">
                <div class="col-sm-8">
                    <p>
                        <strong><?= $line[0] ?></h2></strong> <br>
                        <?= $line[1] ?>
                    </p>
                </div>
                <div class="col-sm-4">
                    <p>
                        <strong><?= number_format($line[2], 2, ',', ' ') ?> €</strong>
                    </p>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php require 'elements/footer.php'; ?>