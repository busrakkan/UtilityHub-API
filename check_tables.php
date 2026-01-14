<?php
$db = new PDO('sqlite:' . __DIR__ . '/var/data.db');
$tables = $db->query("SELECT name FROM sqlite_master WHERE type='table';")->fetchAll(PDO::FETCH_COLUMN);
print_r($tables);