<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .mobile-container {
            max-width: 100%;
            margin: auto;
            height: 500px;
            color: white;
            border-radius: 10px;
        }

        .topnav {
            border-radius: 10px;
            overflow: hidden;
            background-color: #333;
            position: relative;
        }

        .topnav #myLinks {
            display: none;
        }

        .topnav a {
            color: white;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            display: block;
        }

        .topnav a.icon {
            background: black;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .active {
            background-color: #ffffff2b;
            color: white;
        }
    </style>
</head>

<body>


    <div class="mobile-container">

        <div class="topnav">
            <a href="../_index.php" class="active">DOT LEARNING SYSTEM</a>
            <div id="myLinks">
                <a href="../teach/teach.php">課程</a>
                <a href="../quiz/index.php">選擇小測驗</a>
                <a href="../_test/index.php">虛擬鍵盤練習</a>
                <a href="../dis/index.php">討論區</a>
                <a href="../dis/post.php">發文</a>
                <a href="../trans/trans.php">轉翻器</a>
                <a href="../index.php">登出</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("myLinks");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>

</body>

</html>