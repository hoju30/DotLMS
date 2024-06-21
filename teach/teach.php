<?php
    include('save_value.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        #iframe-container {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            overflow: hidden;
        }
          .button5{
            position: absolute;
            bottom: 30px;
            right: 30px;
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #2b7efaed;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            z-index: 1000;
            opacity: 0.8;
        }
        .button{
            position: absolute;
            bottom: 10px;
            right: 5px;
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #2b7efaed;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            z-index: 1000;
            opacity: 0.8;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <button class="button" onclick="stop();"style="bottom: 160px;";>開始</button>
    <button class="button" onclick="pause();"style="bottom: 110px;";>暫停</button>
    <button class="button" onclick="resume();"style="bottom: 60px;";>繼續</button>
    <button ><a href="../_index.php" class="button" onclick="saveValueToDatabase();">回首頁</a></button>
    <div id="iframe-container">
        <iframe id="_iframe" src="https://dive.nutn.edu.tw/Experiment/kaleTestExperiment5.jsp?eid=31451&record=false" name="dive"></iframe>
    </div>
    <script src="https://dive.nutn.edu.tw/Experiment/js/dive.linker.js"></script>
    <script src="io.js"></script>
</body>
</html>
