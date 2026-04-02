<!-- Op deze pagina zie je alle raadsels in een tabel.
     Je ziet per raadsel: de raadsel, het antwoord, de hint en bij welke room die hoort (roomID).
 -->
 <?php
session_start();
require_once('dbcon.php');

// 1. Controleer of de sessie variabelen bestaan
if (!isset($_SESSION['team_id']) || !isset($_SESSION['start_time'])) {
    header("Location: index.php");
    exit;
}

// 2. Tijd correct berekenen in seconden
$end_time = time(); // Huidige tijd in seconden

// Controleer of start_time een datum/tijd tekst is, zet dit dan om naar seconden
$start_time_seconds = is_numeric($_SESSION['start_time']) ? $_SESSION['start_time'] : strtotime($_SESSION['start_time']);
$time_taken = $end_time - $start_time_seconds;

// Zorg ervoor dat de tijd nooit negatief is bij een foutje
if ($time_taken < 0) {
    $time_taken = 0;
}

//  Sla de tijd op in de database
try {
    $stmt = $db_connection->prepare("
        UPDATE teams 
        SET time_score = :time 
        WHERE id = :id
    ");

    $stmt->execute([
        ':time' => $time_taken,
        ':id' => $_SESSION['team_id']
    ]);

} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}

// 4. Stuur de speler naar de juiste pagina
if (isset($_GET['result']) && $_GET['result'] === 'win') {
    header("Location: win.php");
} else {
    header("Location: ver.php");
}
exit;
?>