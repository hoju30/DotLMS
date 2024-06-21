const questions = [
    {
        question: "請回答a的點字記號為何?",
        answers: [
            { text: "⠁(1)", correct: true},
            { text: "⠚(245)", correct: false },
            { text: "⠇(123)", correct: false  },
            { text: "⠕(135)", correct: false }
        ]
    },
    {
        question: "請填入空缺的點字符號(蘋果:app_e)",
        answers: [
            { text: "⠁(1)", correct: false },
            { text: "⠚(245)", correct: false },
            { text: "⠇(123)", correct: true },
            { text: "⠕(135)", correct: false }
        ]
    },
    {
        question: "請完成單詞(天空:sky)的點字符號",
        answers: [
            { text: "⠎⠽⣿(234,13456,123456)", correct: false },
            { text: "⠚⠅⠏(245,13,1234)", correct: false },
            { text: "⠎⠅ ⠽(234,13,13456)", correct: true },
            { text: "⠕⠅ ⠽(135,13,13456)", correct: false }
        ]
    }
];

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "下一題";
    nextButton.style.display = "none";
    showQuestion();
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        if (answer.correct) {
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click", selectAnswer);
        answerButtons.appendChild(button);
    });
}

function resetState() {
    nextButton.style.display = "none";
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";
    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++;
    } else {
        selectedBtn.classList.add("incorrect");
    }
    Array.from(answerButtons.children).forEach(button => {
        if (button.dataset.correct === "true") {
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    nextButton.style.display = "block";
}



function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        showScore();
    }
}

nextButton.addEventListener("click", () => {
    if (currentQuestionIndex < questions.length) {
        handleNextButton();
    } else {
       startQuiz();
    }
});

startQuiz();

function showScore() {
    resetState();
    questionElement.innerHTML = `滿分 ${questions.length} 你得了 ${score} 分`;
    nextButton.innerHTML = '<a href="../_index.php">回首頁</a>';
    nextButton.style.display = "block";
    sendScoreToServer(score);
}



function sendScoreToServer(score) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "score.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log("Score sent to server successfully.");
        }
    };
    xhr.send("score=" + score);
}

