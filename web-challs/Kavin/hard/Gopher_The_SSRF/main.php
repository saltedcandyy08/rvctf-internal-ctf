<?php
// Super secret hex, hidden for the worthy!
echo "\n<!-- 54686973206973206e6f7420612068696e743a204b6176696e206973207665727920736d6172742e0a502e532e206974732061202a46494c452a -->\n";

if (isset($_GET['url'])) {
    $url = $_GET['url'];

    // Handle file: and file:/ (redirect)
    if ($url === "file:" || $url === "file:/") {
        header("Location: /");
        exit;
    }

    // Handle file:// (show "/admin.php")
    if ($url === "file://") {
        echo "/admin.php";
        exit;
    }

    // Handle file:/// (show "admin.php")
    if ($url === "file:///") {
        echo "admin.php";
        exit;
    }

    // Handle file:///admin.php (show PHP source)
    if ($url === "file:///admin.php") {
        if (file_exists("admin.php")) {
            highlight_file("admin.php");
        } else {
            echo "File not found.";
        }
        exit;
    }

    // Handle direct admin.php or /admin.php in url param (show no permission)
    if ($url === "admin.php" || $url === "/admin.php") {
        echo "You don't have permissions";
        exit;
    }

    // Any other URL: redirect back to /
    header("Location: /");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gopher The SSRF</title>
    <style>
        body { background: #e0f7fa; font-family: monospace; text-align: center; }
        .main { margin: 80px auto; width: 390px; background: #fff; border-radius: 11px; border: 2.5px solid #1976d2; padding: 30px; }
        input[type="text"] { width: 250px; padding: 4px 9px; border-radius: 5px; border: 1.5px solid #1976d2;}
        .btn { background: #1976d2; color: #fff; padding: 4px 12px; border-radius: 5px; border: none; font-weight: bold;}
        .hint { color: #00796b; margin: 20px 0 0 0;}
    </style>
</head>
<body>
    <div class="main">
        <h2>🐹 Gopher The SSRF 🐹</h2>
        <form method="GET" action="/">
            <label>Search Site<br>
                <input type="text" name="url" placeholder="Enter a URL" />
            </label>
            <input type="submit" class="btn" value="Search"/>
        </form>
        <div class="hint">
            Hmm... it seems like there's something interesting in <b>admin.php</b>.<br>
            Maybe you should try to access it somehow 🤔 
        </div>
    </div>
</body>
</html>
