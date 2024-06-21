<?php
    include('nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f9f9f9;
       }
       .discussion {
           border-bottom: 1px solid #ccc;
           padding: 10px 0;
           position: relative;
       }
       .discussion h3 {
           margin: 0;
       }
       .comment-button {
           position: absolute;
           right: 10px;
           bottom: 10px;
           cursor: pointer;
           background-color: #007bff;
           color: white;
           border: none;
           padding: 5px 10px;
           border-radius: 3px;
       }
       .comments {
           display: none;
           margin-top: 10px;
       }
       @media (max-width: 768px) {
           .container {
               width: 90%;
           }
       }
       @media (max-width: 480px) {
           .container {
               width: 100%;
               padding: 10px;
           }
       }
    </style>
    <script src="dis.js"></script>
</head>
<body>
<div id="discussions" class="container" style="color: black;"></div>
</body>
</html>
