<?php
$conn = new mysqli("localhost", "root", "rootpassword", "gopherdb");
if (
    $_SERVER['REMOTE_ADDR'] == '127.0.0.1'
    && isset($_SERVER['HTTP_AUTHORIZATION']) && $_SERVER['HTTP_AUTHORIZATION'] === 'ADMIN'
    && isset($_COOKIE['Permission']) && $_COOKIE['Permission'] === 'ADMINISTRATOR'
    && isset($_POST['Id']) && isset($_POST['Password'])
    && $_POST['Id'] === 'admin' && $_POST['Password'] === 'admin'
) {
    $result = $conn->query('SELECT * FROM flag');
    if ($row = $result->fetch_array()) {
        echo "Flag is " . htmlspecialchars($row[0]);
    } else {
        echo "No flag found!";
    }
} else {
    echo "You don't have permissions";
}
?>
