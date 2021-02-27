<?php
$title = 'Home page';
$active = 'index';
require 'elements/header.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Weather.php';


$weather = new Weather('7c0be0c682578a68692483b0f8982c56');
$data = $weather->getForecast('Vaulx-en-Velin,fr');
?>

<div class="container">
    <ul class="list-group">
        <?php foreach($data as $d): ?>
            <li class="list-item">
                <strong><?= $d['date']->format('d/m/Y H:i:s') ?></strong> : <?= $d['description'] ?> <?= $d['temp'] . '°C' ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php require 'elements/footer.php'; ?>

