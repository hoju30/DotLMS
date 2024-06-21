<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>虛擬點字鍵盤測驗</h1>
  <div id="quizSection">
    <form id="quizForm" action="save_results.php" method="post">
      <div id="question">題目: <span id="currentQuestion"></span></div>
      <div class="input-container">
        <input type="text" id="textInput" name="textInput" placeholder="點擊這裡輸入..." readonly onclick="openVirtualKeyboard(this)">
        <input type="hidden" id="questionIndex" name="questionIndex" value="0">
        <input type="hidden" id="questionCorrect" name="questionCorrect" value="0">

        <div id="btn">
          <button type="submit" id="submitAnswer">提交答案</button>
          <button id="submitAnswer1"><a href="../_index.php" style="text-decoration: none; color: white;">回首頁</a></button>
        </div>
      </div>
      <div id="feedback"></div>
    </form>
  </div>


  <div id="brailleKeyboard">
    <div class="braille-row">
      <div class="braille-dot" data-dot="1"></div>
      <div class="braille-dot" data-dot="2"></div>
    </div>
    <div class="braille-row">
      <div class="braille-dot" data-dot="3"></div>
      <div class="braille-dot" data-dot="4"></div>
    </div>
    <div class="braille-row">
      <div class="braille-dot" data-dot="5"></div>
      <div class="braille-dot" data-dot="6"></div>
    </div>
    <div class="keyboard-buttons">
      <button id="confirmButton">確認</button>
      <button id="deleteButton">刪除前一個字</button>
    </div>
  </div>
  <script src="scripts.js"></script>
</body>

</html>