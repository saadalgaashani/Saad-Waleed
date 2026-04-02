<?php
// 1. Maak verbinding met de database.
require_once('../dbcon.php');

// 2. Controleer of het formulier is verzonden
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $riddle = $_POST['riddle'];
    $answer = $_POST['answer'];
    $hint = $_POST['hint'];
    $room_id = $_POST['room_id']; 

    try {
        // Zet de gegevens in de database
        $sql = "INSERT INTO riddles (riddle, answer, hint, roomId) VALUES (:riddle, :answer, :hint, :roomId)";
        $stmt = $db_connection->prepare($sql);
        
        $stmt->execute([
            ':riddle' => $riddle,
            ':answer' => $answer,
            ':hint'   => $hint,
            ':roomId' => $room_id
        ]);

        // 3. Stuur de admin direct terug naar de homepagina
        header("Location: ../index.php");
        exit(); // Zorg ervoor dat het script hier stopt en niet verder laadt

    } catch (PDOException $e) {
        // Sla de foutmelding op om later op de pagina te tonen
        $foutmelding = "<p style='color: red;'>Er ging iets mis: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Add Riddle Page</h2>

<?php 
// Als er een fout was, laat die dan hier zien
if (isset($foutmelding)) { 
    echo $foutmelding; 
} 
?>

<form action="/SAAD-WALEED/admin/add_riddle.php" method="POST" class="team-form">
    <input type="text" name="riddle" placeholder="riddle" required><br><br>
    <input type="text" name="answer" placeholder="answer" required><br><br>
    <input type="text" name="hint" placeholder="hint" required><br><br>
    <input type="number" name="room_id" placeholder="room ID" required><br><br>
    
    <button type="submit" class="play-btn">Save</button>
</form>