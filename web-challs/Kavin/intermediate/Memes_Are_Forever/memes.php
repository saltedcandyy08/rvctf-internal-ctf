<?php
// You wouldn't steal a flag...
if (isset($_GET['meme'])) {
    $meme = $_GET['meme'];
    if ($meme === base64_encode(strrev("pepe"))) {
        echo "<b>RVCTF{DANK_MEMES_NEVER_DIE}</b>";
    } else if ($meme === "pepe") {
        echo "Sorry, only encoded memes allowed (try harder)";
    } else {
        echo "Not dank enough.";
    }
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Memes Are Forever</title>
    <style>
        body { background: #222; color: #fff; font-family: 'Comic Sans MS', cursive; }
        .main { width: 350px; margin: 70px auto; background: #333; border-radius: 15px; padding: 30px; text-align: center; border: 4px double #0ff; }
        .input { padding: 6px 10px; border-radius: 7px; border: 2px solid #0ff; width: 160px; }
        .btn { padding: 5px 15px; background: #0ff; color: #222; border: 0; border-radius: 6px; font-weight: bold; }
        .hint { color: #0ff; margin-top: 15px; }
        img { width: 90px; }
    </style>
</head>
<body>
    <div class="main">
        <h2>Memes Are Forever</h2>
        <img src="https://i.pinimg.com/736x/c0/a2/ca/c0a2ca2edf6d03227430d4fb639ba4aa.jpg" alt="pepe"><br>
        <form method="GET">
            <input class="input" name="meme" placeholder="Your meme here"><br>
            <input class="btn" type="submit" value="Submit Meme">
        </form>
        <div class="hint">
            Only the dankest of memes will survive.<br>
        </div>
    </div>
</body>
</html>
