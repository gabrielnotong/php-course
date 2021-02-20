<?php
require_once 'functions/auth.php';
deniedAccessIfNotGranted();
require_once 'functions/counter.php';
require_once 'data/config.php';
$year = (int)date('Y');
$yearSelected = (int)$_GET['year'] ?? $year;
$months = [
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
];
$monthSelected = $_GET['month'] ?? date('m');

if ($yearSelected && $monthSelected) {
    $total = numberOfViewsPerMonth($yearSelected, $monthSelected);
    $detailedVisites = numberOfViewsPerMonthDetails($yearSelected, $monthSelected);
} else {
    $total = numberOfViews();
}

require_once 'elements/header.php';

?>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <?php $currentYear = $year - $i; ?>
            <a class="list-group-item <?= $currentYear === $yearSelected ? 'active' : ''; ?>" href="dashboard.php?year=<?= $currentYear ?>">
                <?= $currentYear ?>
            </a>
            <?php if ($currentYear === $yearSelected): ?>
                <div class="list-group">
                    <?php foreach ($months as $key => $month): ?>
                        <a href="dashboard.php?year=<?= $currentYear?>&month=<?= $key ?>" 
                        class="list-group-item <?= $monthSelected === (string)$key ? 'active' : ''; ?>">
                            <?= $month ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-5">
            <div class="card-body">
                    <strong style="font-size: 3em;">
                    <?= $total ?>
                    </strong><br>
                    Visite<?= $total > 1 ? 's' : '' ?> on the website        
            </div>
        </div>
        <?php if (!empty($detailedVisites)): ?>
            <h2>Vistes for the month</h2>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Visites</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detailedVisites as $detail): ?>
                    <tr>
                        <td><?= $detail['day'] ?></td>
                        <td><?= $detail['visites'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'elements/footer.php'; ?>