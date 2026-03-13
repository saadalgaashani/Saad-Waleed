<?php
require_once('../dbcon.php');

try {
  $stmt = $db_connection->query("SELECT * FROM riddles WHERE roomId = 1");
  $riddles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Databasefout: " . $e->getMessage());

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Escape Room 1</title>

<link rel="stylesheet" href="/SAAD-WALEED/css/room-1.css">
<script src="/SAAD-WALEED/js/room-1.js" defer></script>

</head>

<body>


<div class="room">
<h1>Find the three ghosts in time</h1>

<img src="/Saad-Waleed/room-1.png" alt="Room-1-Foto">
<!-- eerste raadsel -->

<button id="secretSpot1"></button>

<div class="riddle-container1" id="riddleBox1">

<p><?= $riddles[0]['riddle']; ?></p>

<input type="text" id="answerInput1" placeholder="Write your answer">
<button id="submitAnswer1">Submit</button>

<p id="result1"></p>

<script>
const correctAnswer1 = "<?= $riddles[0]['answer']; ?>";
</script>

</div>


<!-- tweede raadsel -->

<div id="secretSpot2"></div>

<div class="riddle-container2" id="riddleBox2">

<p><?= $riddles[1]['riddle']; ?></p>

<input type="text" id="answerInput2" placeholder="Write your answer">
<button id="submitAnswer2">Submit</button>

<p id="result2"></p>

<script>
const correctAnswer2 = "<?= $riddles[1]['answer']; ?>";
</script>

</div>


<!-- derde raadsel -->

<div id="secretSpot3"></div>

<div class="riddle-container3" id="riddleBox3">

<p><?= $riddles[2]['riddle']; ?></p>

<input type="text" id="answerInput3" placeholder="Write your answer">
<button id="submitAnswer3">Submit</button>

<p id="result3"></p>

<script>
const correctAnswer3 = "<?= $riddles[2]['answer']; ?>";
</script>

</div>
<div id="timer">02:00</div>

</div>



</body>
</html>

</body>

</html>