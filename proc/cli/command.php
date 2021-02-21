<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'TimeSlot.php';

$timeSlot1 = new TimeSlot(8, 17);
$timeSlot2 = new TimeSlot(6,19);

var_dump($timeSlot1->isThereACollision($timeSlot2));
var_dump($timeSlot1->isHourIncluded(5));