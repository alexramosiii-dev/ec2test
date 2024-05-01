<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url("/assets/css/style.css") ?>">
</head>
<body>
    <main>
        <div id="container">
            <h1>Submitted Entry</h1>
            <div>
                <p for="user_name">Your Name (optional):</p>
                <span><?= $user_name ?></span>
            </div>
            <div>
                <p for="course">Course Title:</p>
                <span><?= $course ?></span>
            </div>
            <div>
                <p for="score">Give Score (1-10):</p>
                <span><?= $score?></span>
            </div>
            <div>
                <p for="reason">Reason:</p>
                <span id="reason"><?= $reason ?></span>
            </div>
        </div>

        <a id="return"href="/main">Return</a>
    </main>
</body>
</html>
