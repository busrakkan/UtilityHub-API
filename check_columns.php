<?php
$db = new PDO('sqlite:' . __DIR__ . '/var/data.db');
$columns = $db->query("PRAGMA table_info('offers');")->fetchAll(PDO::FETCH_ASSOC);
print_r($columns);