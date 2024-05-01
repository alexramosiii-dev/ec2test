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
        <h1>Feedback Form</h1>
        <form action="/main/submit" method="get">
            <label for="user_name">Your Name (optional):</label>
            <input type="text" id="user_name" name="user_name">

            <label for="course">Course Title:</label>
            <select name="course" id="course">
                <option value="PHP">PHP Track</option>
                <option value="JavaScript">JavaScript Track</option>
                <option value="Ruby">Ruby Track</option>
            </select>
            
            <label for="score">Give Score (1-10):</label>
            <select name="score" id="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>

                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason" cols="35" rows="7" ></textarea>

            <input type="submit" value="Submit">
        </form>
    </main>
</body>
</html>