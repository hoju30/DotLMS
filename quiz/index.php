<?php
include 'score.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="app">
        <h1>英文點字小測驗</h1>
        <div class="quiz">
            <h2 id="question">問題如下</h2>
            <div id="answer-buttons">
                <input type="button" class="btn" placeholder="選擇一">
                <input type="button" class="btn" placeholder="選擇一">
                <input type="button" class="btn" placeholder="選擇一">
                <input type="button" class="btn" placeholder="選擇一">
            </div>
            <button type="submit" id="next-btn" value="下一題" name="submit">下一題</button>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>