<?php
include 'db.php';
session_start();

$csrf_token = "12345";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Registration handling
    if ($_POST["action"] == "Register" && $_POST["csrf_token"] == $csrf_token) {
        $username = $_POST["reg_username"];
        $password = password_hash($_POST["reg_password"], PASSWORD_DEFAULT);

        $stmt = $db->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bindValue(1, $username);
        $result = $stmt->execute();

        if ($result->fetchArray()) {
            $_SESSION['message'] = "Username already exists. Please choose another.";
            header("Location: account.html");
            exit;
        } else {
            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $password);
            
            if ($stmt->execute()) {
                $_SESSION['message'] = "Account created successfully.";
                header("Location: account.html");
                exit;
            } else {
                $_SESSION['message'] = "Error: Could not create account.";
                header("Location: account.html");
                exit;
            }
        }
    }

    // Login handling
    if ($_POST["action"] == "Login" && $_POST["csrf_token"] == $csrf_token) {
        $username = $_POST["login_username"];
        $password = $_POST["login_password"];

        $stmt = $db->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bindValue(1, $username);
        $result = $stmt->execute();

        $row = $result->fetchArray();
        if ($row && password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['message'] = "Invalid username or password.";
            header("Location: account.html");
            exit;
        }
    }
}
?>
