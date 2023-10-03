<?php

$db = new SQLite3('users.db');

$db->exec("CREATE TABLE IF NOT EXISTS users (username TEXT PRIMARY KEY, password TEXT)");

$sample_username = 'testuser';
$sample_password = password_hash('testpassword', PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT OR IGNORE INTO users (username, password) VALUES (?, ?)");
$stmt->bindValue(1, $sample_username);
$stmt->bindValue(2, $sample_password);
$stmt->execute();

echo "Initialization complete. Sample user added.";

?>
