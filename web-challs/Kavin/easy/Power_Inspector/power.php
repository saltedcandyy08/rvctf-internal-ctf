<!DOCTYPE html>
<html>
<head>
    <title>Power Inspector - Rise of Kingdoms</title>
    <style>
        body { background: #f5e6cc; font-family: 'Times New Roman', serif; color: #5c4326; }
        .castle { text-align: center; margin-top: 60px; }
        .banner { font-size: 2em; font-weight: bold; }
        .flag { color: #a67c00; font-size: 1.2em; }
        .throne { margin: 40px auto; width: 300px; border: 5px solid #a67c00; background: #fffbe6; padding: 25px; border-radius: 12px; }
    </style>
</head>
<body>
    <div class="castle">
        <div class="banner">🏰 Power Inspector 🏰</div>
        <div class="throne">
            <?php
            if(isset($_COOKIE['user']) && (strtolower($_COOKIE['user']) === 'king' || strtolower($_COOKIE['user']) === 'queen')) {
                echo '<span class="flag">RVCTF{cookie_power_is_real}</span>';
            } else {
                echo 'You are not in power!';
            }
            ?>
        </div>
    </div>
</body>
</html>
