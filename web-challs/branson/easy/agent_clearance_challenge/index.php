<?php
// Set default cookies if not already set
if (!isset($_COOKIE['clearance'])) {
    setcookie('clearance', 'this_is_not_the_real_clearance', time() + 86400, "/");
}

if (!isset($_COOKIE['agent_id'])) {
    setcookie('agent_id', 'rookie', time() + 86400, "/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agent Clearance Portal</title>
    <style>
        /* Vibrant animated cyberpunk background */
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(270deg, #0f0c29, #302b63, #24243e, #0f0c29, #00c6ff, #0072ff);
            background-size: 1200% 1200%;
            animation: gradientShift 20s ease infinite;
            color: #b2d8f7;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            25% { background-position: 50% 50%; }
            50% { background-position: 100% 50%; }
            75% { background-position: 50% 50%; }
            100% { background-position: 0% 50%; }
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            overflow: hidden;
            border-right: .15em solid #b2d8f7;
            white-space: nowrap;
            animation: typing 4s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #b2d8f7; }
        }

        p {
            background: rgba(178, 216, 247, 0.08);
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(178, 216, 247, 0.2);
            max-width: 600px;
            margin: 10px;
            font-size: 1.2em;
            line-height: 1.6em;
        }

        strong {
            color: #72ffb6;
        }
    </style>
</head>
<body>
    <h1>🔒 Agent Clearance System</h1>
    <p>Only the properly authorized agents may proceed.</p>

<?php
// Check cookies
if (isset($_COOKIE['clearance']) && isset($_COOKIE['agent_id'])) {
    $clearance = $_COOKIE['clearance'];
    $agent_id = $_COOKIE['agent_id'];

    if ($clearance === 'super_secure_clearance' && $agent_id === 'agent_alena') {
        echo "<p>✅ Clearance verified!</p>";
        echo "<p>The flag is: <strong>RVCTF{mission_successfully_infiltrated}</strong></p>";
    } else {
        echo "<p>❌ Incorrect credentials. Stay sharp, agent.</p>";
    }
} else {
    echo "<p>🔒 Missing credentials. You aren't trying to infiltrate us, are you?</p>";
}
?>
</body>
</html>
