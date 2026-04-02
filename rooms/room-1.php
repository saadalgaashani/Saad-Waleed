<?php
session_start();
require_once('../dbcon.php');

if (!isset($_SESSION['team_id'])) {
  header("Location: /SAAD-WALEED/index.php");
  exit;
}

try {
  $stmt = $db_connection->query("SELECT * FROM riddles WHERE roomId = 1");
  $riddles = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($riddles) < 3) {
    die("Er zijn niet genoeg raadsels voor kamer 1.");
  }

  $teamStmt = $db_connection->prepare("SELECT * FROM teams WHERE id = :id");
  $teamStmt->execute([':id' => $_SESSION['team_id']]);
  $team = $teamStmt->fetch(PDO::FETCH_ASSOC);

  if (!$team) {
    die("Team niet gevonden.");
  }

} catch (PDOException $e) {
  die("Databasefout: " . $e->getMessage()); 
}


$_SESSION['start_time'] = strtotime($team['start_time']); // in seconden
?>

<!DOCTYPE html>

<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Escape Room 1</title>

<link rel="stylesheet" href="/SAAD-WALEED/css/room-1.css">
<script src="/SAAD-WALEED/js/room-1.js" defer></script>

<link href="https://fonts.googleapis.com/css2?family=Bpmf+Huninn&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="room">
  <div class="team-box">
    <!-- team  mooie -->
    <h3>Team info</h3>
    <p><strong>Team:</strong> <?= htmlspecialchars($team['team_name']); ?></p>
    <p><?= htmlspecialchars($team['member1']); ?></p>
    <p><?= htmlspecialchars($team['member2']); ?></p>
    <p><?= htmlspecialchars($team['member3']); ?></p>
  </div>

  <h1>Find the three ghosts in time</h1>

  <img src="/SAAD-WALEED/room-1.png" alt="Room-1-Foto">

  <button id="secretSpot1"></button>

  <div class="riddle-container1" id="riddleBox1">
    <p><?= htmlspecialchars($riddles[0]['riddle']); ?></p>


    <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 10px;">
    <input type="text" id="answerInput1" placeholder="Write your answer">

    <button id="submitAnswer1">Submit</button>

    <button id="hintButton1">Hint
       <p id="hintText1" style="display: none; color: #000000; font-style: italic; ">
        <?= htmlspecialchars($riddles[0]['hint']); ?>
    </p>
    </button>
   </div>



    
    <p id="result1"></p>

    <script>
      const correctAnswer1 = "<?= htmlspecialchars($riddles[0]['answer'], ENT_QUOTES); ?>";

      document.getElementById('hintButton1').addEventListener('click', function() {
            document.getElementById('hintText1').style.display = 'block';
        });
    </script>
  </div>

  <div id="secretSpot2"></div>

  <div class="riddle-container2" id="riddleBox2">
    <p><?= htmlspecialchars($riddles[1]['riddle']); ?></p>

    <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 10px;">
    <input type="text" id="answerInput2" placeholder="Write your answer">

    <button id="submitAnswer2">Submit</button>

    <button id="hintButton2">Hint
       <p id="hintText2" style="display: none; color: #000000; font-style: italic; ">
        <?= htmlspecialchars($riddles[1]['hint']); ?>
    </p>
    </button>
   </div>

    <p id="result2"></p>

     <script>
      const correctAnswer2 = "<?= htmlspecialchars($riddles[1]['answer'], ENT_QUOTES); ?>";

      document.getElementById('hintButton2').addEventListener('click', function() {
            document.getElementById('hintText2').style.display = 'block';
        });
    </script>

  </div>

  <div id="secretSpot3"></div>

  <div class="riddle-container3" id="riddleBox3">
    <p><?= htmlspecialchars($riddles[2]['riddle']); ?></p>

   <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 10px;">
    <input type="text" id="answerInput3" placeholder="Write your answer">

    <button id="submitAnswer3">Submit</button>

    <button id="hintButton3">Hint
       <p id="hintText3" style="display: none; color: #000000; font-style: italic; ">
        <?= htmlspecialchars($riddles[2]['hint']); ?>
    </p>
    </button>
   </div>

    <p id="result3"></p>

     <script>
      const correctAnswer3 = "<?= htmlspecialchars($riddles[2]['answer'], ENT_QUOTES); ?>";

      document.getElementById('hintButton3').addEventListener('click', function() {
            document.getElementById('hintText3').style.display = 'block';
        });
    </script>

  </div>

  <div id="timer">02:00</div>
</div>

</body>
</html>