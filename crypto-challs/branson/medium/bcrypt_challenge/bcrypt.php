<?php
session_start();

// Hardcoded credentials
$correct_username = "Tony";
// Bcrypt hash of "02691" (you can regenerate with password_hash in PHP)
$stored_hash = '$2y$12$rF5hTIcgdAUxDNnpfUvAAumgU.rD.C/4Nl.7dfVbEQ3GLZGnBuM8i';
$flag = "CTF{bcrypt_burned_my_brain}";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $correct_username && password_verify($password, $stored_hash)) {
        $success = true;
    } else {
        $_SESSION['error'] = "❌ Invalid credentials. Try again!";
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tony's Admin Portal</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 100px;
            background-color: #f7f7f7;
        }
        input {
            padding: 10px;
            margin: 5px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>🔐 Tony's Admin Portal</h1>

    <?php if (!empty($success)): ?>
        <h2>Welcome, Tony!</h2>
        <p>Your flag is: <code><?= $flag ?></code></p>
    <?php else: ?>
        <p>Please enter your credentials:</p>
        <?php if (!empty($_SESSION['error'])): ?>
            <p style="color: red"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="5-digit Password" required><br>
            <input type="submit" value="Login">
        </form>
    <?php endif; ?>
</body>
</html>
