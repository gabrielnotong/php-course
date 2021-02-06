<?php
session_start();

$title = 'Contact us !';
$active = 'contact';
require 'data/config.php';
require 'functions.php';

$hour = (int)($_POST['hour'] ?? date('H'));
$dayNumber = (int)($_POST['day'] ?? date('N') - 1);
$openingHours = HOURS[$dayNumber];
$opened = inHours($hour, $openingHours);
$color = $opened ? 'green' : 'red';

require 'elements/header.php';
?>

<div id="container">
    <div class="row">
        <div class="col-8">
            <h2>Debug</h2>
            <pre>
                <?php var_dump($_SESSION); ?>
            </pre>
            <h2>Nous contacter</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita nesciunt voluptatibus ullam qui officia minima aliquid, labore pariatur veniam rem laudantium harum, nulla doloremque natus! Impedit deleniti ipsa dolorum similique.</p>
        </div>
        <div class="col-4">
            <h2>Horaires d'ouvertures</h2>
            
            <form method="post">
                <div class="form-group">
                    <select name="day" class="form-control">
                        <?php foreach(DAYS as $k => $day): ?>
                            <option value="<?= $k ?>"
                            <?php if ($k === $dayNumber): ?>
                                selected
                            <?php endif ?>
                            >
                            <?= $day ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="hour" value="<?= $hour ?>">
                </div>
                <button class="btn btn-primary mb-5" type="submit">Check</button>
            </form>

            <?php if($opened): ?>
                <div class="alert alert-success">
                    <h5>Le magasin est ouvert</h5>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <h5>Le magasin est fermé</h5>
                </div>
            <?php endif; ?>
            <ul>
            <?php foreach(DAYS as $key => $day): ?>
                <li <?php if($key === $dayNumber): ?> style="color: <?= $color ?>" <?php endif ?>>
                    <strong><?= $day ?>:&nbsp;</strong>
                    <?= openingHoursHtml(HOURS[$key]) ?>
                </li>
            <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>

<?php require 'elements/footer.php'; ?>