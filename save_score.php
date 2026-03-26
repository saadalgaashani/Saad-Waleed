<?php
session_start();
require_once('dbcon.php');

// 1. Controleer of de sessie variabelen bestaan
if (!isset($_SESSION['team_id']) || !isset($_SESSION['start_time'])) {
    header("Location: index.php");
    exit;
}

// 2. Tijd berekenen
$end_time = time(); 
$start_time_seconds = is_numeric($_SESSION['start_time']) ? $_SESSION['start_time'] : strtotime($_SESSION['start_time']);
$time_taken = $end_time - $start_time_seconds;

if ($time_taken < 0) {
    $time_taken = 0;
}

// 3. Opslaan in database
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
    die("FOUT BIJ OPSLAAN: " . $e->getMessage());
}

// 4. Automatisch doorsturen
if (isset($_GET['result']) && $_GET['result'] === 'win') {
    header("Location: win.php");
} else {
    header("Location: ver.php");
}
exit;
?>