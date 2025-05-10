<!DOCTYPE html>
<html>
<head>
    <title>Castle Portal - Simple SQL</title>
    <style>
        body { background: #f5e6cc; font-family: 'Georgia', serif; color: #4e3600; }
        .kingdom { max-width: 450px; margin: 60px auto; background: #fffbe6; border-radius: 14px; border: 3px solid #c2aa7a; box-shadow: 0 4px 20px #cabfa1; }
        h2 { text-align: center; font-family: 'Georgia', serif; margin-top: 0; padding-top: 25px; }
        .form-area { padding: 25px; text-align: center; }
        .btn { background: #dab96e; color: #fff; border: none; padding: 8px 25px; border-radius: 6px; font-size: 1em; cursor: pointer; }
        .msg { margin-top: 18px; font-weight: bold; }
        .castle-img { width: 60px; margin: 18px auto; display: block; }
        .hint { color: #b59b42; font-size: 0.97em; margin-bottom: 10px;}
        input[type="text"], input[type="password"] { border: 1.5px solid #bfa85d; border-radius: 5px; padding: 6px 10px; font-size: 1em; margin-bottom: 13px;}
    </style>
</head>
<body>
<div class="kingdom">
    <h2>🏰 Castle Portal 🏰</h2>
    <img class="castle-img" src="https://hips.hearstapps.com/hmg-prod/images/bojnice-castle-1603142898.jpg" alt="Castle">
    <div class="form-area">
        <form method="GET">
            <input type="text" name="id" placeholder="User" /><br>
            <input type="password" name="password" placeholder="Password" /><br>
            <button type="submit" class="btn">Enter the Castle</button>
        </form>
        <div class="msg">
<?php
// Intermediate SQL
$db = new SQLite3(':memory:');
$db->exec("CREATE TABLE users(id INTEGER PRIMARY KEY, username TEXT, password TEXT);");
$db->exec("INSERT INTO users VALUES(1,'king','RVCTF{numeric_sql_inject}');");
$db->exec("INSERT INTO users VALUES(2,'peasant','12345');");
$id = isset($_GET['id']) ? $_GET['id'] : '';
$pw = isset($_GET['password']) ? $_GET['password'] : '';
$msg = '';
if ($id !== '') {
    $sql = "SELECT password FROM users WHERE id = $id";
    $res = @$db->query($sql); 
    if ($res !== false) {
        $row = $res->fetchArray();
        if($row && $row['password'] === $pw) {
            $msg = 'Welcome! Flag: <b>' . htmlspecialchars($row['password']) . '</b>';
        } else {
            $msg = 'Login failed!';
        }
    } else {
        $msg = 'Query error! Please enter a valid numeric ID.';
    }
}
echo $msg;
?>
        </div>
    </div>
</div>
</body>
</html>
