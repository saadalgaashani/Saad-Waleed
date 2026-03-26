<?php   
session_start();
require_once('dbcon.php');

// Stuur terug als er geen team is
if (!isset($_SESSION['team_id'])) {
  header("Location: index.php");
  exit;
}

// Haal de gegevens van dit team op uit de database
try {
  $teamStmt = $db_connection->prepare("SELECT * FROM teams WHERE id = :id");
  $teamStmt->execute([':id' => $_SESSION['team_id']]);
  $team = $teamStmt->fetch(PDO::FETCH_ASSOC);

  if (!$team) {
    die("Team niet gevonden.");
  }
} catch (PDOException $e) {
  die("Databasefout: " . $e->getMessage());
}

// Zet de seconden uit de database om naar een mooie tijd (bijv. 02:45)
$tijd_in_seconden = $team['time_score'] ?? 0;
$minuten = floor($tijd_in_seconden / 60);
$seconden = $tijd_in_seconden % 60;
$geformatteerde_tijd = sprintf("%02d:%02d", $minuten, $seconden);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>You Lost</title>
<link href="https://fonts.googleapis.com/css2?family=Bpmf+Huninn&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family: "Bpmf Huninn", sans-serif;
  font-weight: 400;
  font-style: normal;}

.lose{
position:relative;
  width:100vw;
  height:100vh;
  overflow:hidden
}

.lose img{
 width:100%;
  height:100%;
  display:block;


}


.content{
position:absolute;
top:65%;
left:50%;
transform:translate(-50%,-50%);
text-align:center;
width:90%;
}

.content h1{
color:white;
font-size:3rem;
text-shadow:0 0 10px black;
margin-bottom:25px;
}

#play{
display:inline-block;
padding:16px 40px;
background:#ff8c00;
color:#fff;
text-decoration:none;
font-size:1.3rem;
font-weight:bold;
border-radius:10px;
box-shadow:0 0 10px black;
transition:0.3s;
}

#play:hover{
background:#e67e00;
transform:scale(1.05);
}

@media (max-width:768px){

.content h1{
font-size:2rem;
}

#play{
font-size:1rem;
padding:12px 24px;
}

}


.team-box {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.75);
    color: white;
    padding: 15px;
    border-radius: 12px;
    width: 220px;
    z-index: 1000;
}

</style>
</head>

<body>

<div class="lose">
<div class="team-box">
      <h3>Team info</h3>
      <p><strong>Time:</strong> <?= $geformatteerde_tijd; ?></p>
      <p><strong>Team:</strong> <?= htmlspecialchars($team['team_name']); ?></p>
      <p><?= htmlspecialchars($team['member1']); ?></p>
      <p><?= htmlspecialchars($team['member2']); ?></p>
      <p><?= htmlspecialchars($team['member3']); ?></p>
    </div>
    <img src="/SAAD-WALEED/verpagina.jpg" alt="verlies foto">

<div class="content">
<h1>Helaas, volgende keer beter!</h1>

<a id="play" href="/SAAD-WALEED/rooms/room-1.php">
Restart
</a>

</div>

</div>

</body>
</html>