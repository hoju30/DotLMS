<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="trans.css">
    <script src="trans.js">
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-image: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url('../img/trans.jpg');
        }

        input,
        button {
            padding: 10px;
            font-size: 16px;
            margin: 5px 0;
            border-radius: 5px;

        }

        #result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: black;
            border-radius: 5px;
        }

        button {
            width: 100px;
            color: white;
            background-color: rgba(108, 108, 108, 0.744);
        }
    </style>
</head>

<body>
    <?php
    include('_nav.php');
    ?>
    <h1>英文轉生器點字</h1>
    <input type="text" id="textInput" placeholder="輸入英文">
    <button onclick="translateToBraille()">翻譯</button>
    <div id="result"></div>
</body>

</html>