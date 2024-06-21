const brailleMap = {
  "100000": "a", "101000": "b", "110000": "c", "110100": "d",
  "100100": "e", "111000": "f", "111100": "g", "101100": "h",
  "011000": "i", "011100": "j", "100010": "k", "101010": "l",
  "110010": "m", "110110": "n", "100110": "o", "111010": "p",
  "111110": "q", "101110": "r", "011010": "s", "011110": "t",
  "100011": "u", "101011": "v", "011101": "w", "110011": "x",
  "110111": "y", "100111": "z"
};

const textInput = document.getElementById('textInput');
const brailleKeyboard = document.getElementById('brailleKeyboard');
const confirmButton = document.getElementById('confirmButton');
const deleteButton = document.getElementById('deleteButton');
const submitAnswer = document.getElementById('submitAnswer');
const currentQuestion = document.getElementById('currentQuestion');
const questionIndex = document.getElementById('questionIndex');
const questionCorrect = document.getElementById('questionCorrect');
const btn = document.getElementById('btn');

const quizQuestions = ["love", "nutn"];
let currentQuestionIndex = parseInt(new URLSearchParams(window.location.search).get('questionIndex')) || 0;
questionIndex.value = currentQuestionIndex;

textInput.addEventListener('focus', function() {
  brailleKeyboard.style.display = 'block';
  btn.style.display = 'none';
});

document.addEventListener('mousedown', function(event) {
  if (!brailleKeyboard.contains(event.target) && event.target !== textInput) {
    brailleKeyboard.style.display = 'none';
    btn.style.display = 'block';
  }
});

document.querySelectorAll('.braille-dot').forEach(dot => {
  dot.addEventListener('click', function() {
    this.classList.toggle('active');
    updateOutput();
  });
});

confirmButton.addEventListener('click', function() {
  const binary = getBinaryBraille();
  const character = brailleMap[binary] || '?';
  textInput.value += character;
  resetBrailleDots();
  updateOutput();
});

deleteButton.addEventListener('click', function() {
  textInput.value = textInput.value.slice(0, -1);
});

submitAnswer.addEventListener('click', function(event) {
  event.preventDefault();

  const userInput = textInput.value.trim();
  const isCorrect = userInput === quizQuestions[currentQuestionIndex];
  questionCorrect.value = isCorrect ? 1 : 0;

  const data = {
    questionIndex: currentQuestionIndex,
    answer: userInput,
    correct: isCorrect ? "正確" : "錯誤"
  };

  fetch('save_results.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
  .then(response => response.json())
  .then(result => {
    if (currentQuestionIndex < quizQuestions.length - 1) {
      const feedbackMessage = isCorrect ? "正確!" : "錯誤，請再試一次。";
      alert(feedbackMessage);

      currentQuestionIndex++;
      questionIndex.value = currentQuestionIndex;
      loadQuestion();
      textInput.value = '';
    } else {
      alert("答完題目，回首頁");
      window.location.href = '../_index.php';
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });
});

function getBinaryBraille() {
  let binary = '';
  document.querySelectorAll('.braille-dot').forEach(dot => {
    binary += dot.classList.contains('active') ? '1' : '0';
  });
  return binary;
}

function updateOutput() {
  const binary = getBinaryBraille();
  const character = brailleMap[binary] || '?';
}

function resetBrailleDots() {
  document.querySelectorAll('.braille-dot').forEach(dot => {
    dot.classList.remove('active');
  });
}

function loadQuestion() {
  console.log("Loading question index: ", currentQuestionIndex);
  currentQuestion.textContent = quizQuestions[currentQuestionIndex];
}

loadQuestion();
