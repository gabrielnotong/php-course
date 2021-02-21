<?php
$dbPath = './db.sqlite';

if(file_exists($dbPath)) {
        unlink($dbPath);
}

$db = new SQLite3($dbPath);
$db->exec("CREATE TABLE IF NOT EXISTS checking(id INTEGER PRIMARY KEY NOT NULL, customer VARCHAR(255), created DATETIME)");
$db->exec("INSERT INTO checking(customer, created) VALUES('DEV6', DATETIME())");
$db->exec("INSERT INTO checking(customer, created) VALUES('ALEOP', DATETIME())");
$db->exec("INSERT INTO checking(customer, created) VALUES('MINI', DATETIME())");
$db->exec("INSERT INTO checking(customer, created) VALUES('DENISZ', DATETIME())");

