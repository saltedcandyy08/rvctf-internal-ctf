<?php
// Set the default mafia level cookie to something low-rank
if (!isset($_COOKIE['mafialevel'])) {
    setcookie('mafialevel', 'underboss', time() + 86400, "/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>La Famiglia Login</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #e0e0e0;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Family</h1>
    <p>Only the true boss gets the real respect...</p>
    <!--I heard that the boss really likes COOKIES while listening to -.-. .- .--. --- _ -.. .. _ - ..- - - .. _ -.-. .- .--. .. probably not that important though. -->

<?php
// Check the user's cookie
if (isset($_COOKIE['mafialevel'])) {
    $mafialevel = $_COOKIE['mafialevel'];
    
    if ($mafialevel === 'capo_di_tutti_capi') {
        echo "<p>Welcome, true Boss! The flag is: <strong>RVCTF{true_mafia_boss}</strong></p>";
    } elseif (strtoupper($mafialevel) === 'CAPOTDITTUTTITCAPI') {
        echo "<p>Hmmm... Try using <strong>lowercase letters</strong> and <strong>underscores</strong>.</p>";
    } else {
        echo "<p>You are not the boss.</p>";
    }
} else {
    echo "<p>You are not the boss.</p>";
}
?>
</body>
</html>
