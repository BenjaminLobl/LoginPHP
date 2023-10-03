<?php
$db = new SQLite3('users.db');
$db->exec("CREATE TABLE IF NOT EXISTS users (username TEXT PRIMARY KEY, password TEXT)");
?>