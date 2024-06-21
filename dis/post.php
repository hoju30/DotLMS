<?php include '_nav.php'; ?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="post.css">
    <script src="dis.js"></script>
</head>

<body>
    <div class="container">
        <div class="new-discussion">
            <h2>創建新討論</h2>
            <form id="discussionForm" action="save_discussion.php" method="post">
                <input type="text" id="title" name="title" placeholder="輸入標題" required>
                <textarea id="content" name="content" placeholder="內文" required></textarea>
                <br>
                <button type="submit">輸出</button>
            </form>
        </div>
    </div>
</body>

</html>
