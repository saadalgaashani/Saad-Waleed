<?php
session_start();
require_once('../dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $team_name = trim($_POST['team_name']);
    $member1 = trim($_POST['member1']);
    $member2 = trim($_POST['member2']);
    $member3 = trim($_POST['member3']);

    $start_time = date('Y-m-d H:i:s');
    $status = 'playing';

    try {
        $sql = "INSERT INTO teams (team_name, member1, member2, member3, start_time, status)
                VALUES (:team_name, :member1, :member2, :member3, :start_time, :status)";

        $stmt = $db_connection->prepare($sql);
        $stmt->execute([
            ':team_name' => $team_name,
            ':member1' => $member1,
            ':member2' => $member2,
            ':member3' => $member3,
            ':start_time' => $start_time,
            ':status' => $status
        ]);

        $team_id = $db_connection->lastInsertId();

        $_SESSION['team_id'] = $team_id;
        $_SESSION['team_name'] = $team_name;

        header("Location: /SAAD-WALEED/rooms/room-1.php");
        exit;
    } catch (PDOException $e) {
        die("Fout bij opslaan van team: " . $e->getMessage());
    }
} else {
    header("Location: /SAAD-WALEED/index.php");
    exit;
}