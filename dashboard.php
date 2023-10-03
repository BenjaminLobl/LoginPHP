<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: account.html"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>

<p>You are successfully logged in.</p>

<a href="logout.php">Logout</a>

</body>
</html>
