// eerste raadsel


const button1 = document.getElementById("submitAnswer1");
const secretSpot1 = document.getElementById("secretSpot1");
const riddleBox1 = document.getElementById("riddleBox1");

riddleBox1.style.display = "none";

secretSpot1.addEventListener("click", function() {
    riddleBox1.style.display = "block";
});

button1.addEventListener("click", function() {
    const userAnswer = document.getElementById("answerInput1").value.toLowerCase();

    if (userAnswer === correctAnswer1) {
        document.getElementById("result1").innerText = "Correct!";
    } else {
        document.getElementById("result1").innerText = "Wrong answer. Try again.";
    }
});

// tweede raadsel

const button2 = document.getElementById("submitAnswer2");
const secretSpot2 = document.getElementById("secretSpot2");
const riddleBox2 = document.getElementById("riddleBox2");

riddleBox2.style.display = "none";

secretSpot2.addEventListener("click", function() {
    riddleBox2.style.display = "block";
});

button2.addEventListener("click", function() {
    const userAnswer = document.getElementById("answerInput2").value.toLowerCase();

    if (userAnswer === correctAnswer2) {
        document.getElementById("result2").innerText = "Correct!";
    } else {
        document.getElementById("result2").innerText = "Wrong answer. Try again.";
    }
});

// derde raadsel

const button3 = document.getElementById("submitAnswer3");
const secretSpot3 = document.getElementById("secretSpot3");
const riddleBox3 = document.getElementById("riddleBox3");

riddleBox3.style.display = "none";

secretSpot3.addEventListener("click", function() {
    riddleBox3.style.display = "block";
});

button3.addEventListener("click", function() {
    const userAnswer = document.getElementById("answerInput3").value.toLowerCase();

    if (userAnswer === correctAnswer3) {
        document.getElementById("result3").innerText = "Correct!";
    } else {
        document.getElementById("result3").innerText = "Wrong answer. Try again.";
    }
});
















let totalTime = 2 * 60; // 2 دقائق بالثواني

let countdown = setInterval(function() {
  let minutes = Math.floor(totalTime / 60);
  let seconds = totalTime % 60;

  // عرض الوقت بصيغة 00:00
  document.getElementById('timer').textContent =
    `${minutes.toString().padStart(2,'0')}:${seconds.toString().padStart(2,'0')}`;

  totalTime--;

  if(totalTime < 0){
    clearInterval(countdown); // إيقاف العداد
    window.location.href = "/SAAD-WALEED/ver.php"; // الانتقال للصفحة
  }
}, 1000);


function checkBothCorrect(){
  if(correct1 && correct2 && correct3){
    window.location.href = "win.html";
  }
}


function restartGame(){
  window.location.href="room-1.php"
}