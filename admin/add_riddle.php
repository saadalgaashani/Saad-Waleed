<?php
require_once('../dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $riddle = $_POST['riddle'];
    $answer = $_POST['answer'];
    $hint = $_POST['hint'];
    $room_id = $_POST['room_id']; 

    try {
        $sql = "INSERT INTO riddles (riddle, answer, hint, roomId) VALUES (:riddle, :answer, :hint, :roomId)";
        $stmt = $db_connection->prepare($sql);
        
        $stmt->execute([
            ':riddle' => $riddle,
            ':answer' => $answer,
            ':hint'   => $hint,
            ':roomId' => $room_id
        ]);

        header("Location: ../index.php");
        exit(); 
    } catch (PDOException $e) {
        $foutmelding = "<p style='color: red; text-align: center;'>Er ging iets mis: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Add New Riddle</title>
    
    <link rel="stylesheet" href="../css/home.css">
    
    <style>
        body {
            color: white;
            font-family: sans-serif;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important; 
            min-height: 100vh; 
            padding-top: 40px;
        }

        .admin-nav {
            margin-bottom: 30px;
            text-align: center;
            z-index: 10; 
        }
        
        .admin-nav a {
            color: #f1c40f; 
            text-decoration: none;
            margin-right: 15px;
            font-size: 18px;
            text-shadow: 2px 2px 4px black; 
        font-family: 'Kalam', cursive; 

        }

        h2 {
            color: #f1c40f; 
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px black;
            z-index: 10;
        }

        form {
            background-color: rgba(44, 41, 41, 0.85); 
            padding: 30px;
            border-radius: 8px; 
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.8); 
            z-index: 10;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 4px;
            box-sizing: border-box; 
        }

        button {
            background-color: #f1c40f;
            color: #222;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #d4ac0d; 
        }
    </style>
</head>
<body>
    <div class="admin-nav">
        <a href="../index.php">Back to Home</a>
        <a href="show_all_riddles.php">View All Riddles</a>
    </div>

    <h2>Add Riddle Page</h2>

    <?php 
    if (isset($foutmelding)) { 
        echo $foutmelding; 
    } 
    ?>

    <form action="/SAAD-WALEED/admin/add_riddle.php" method="POST">
        <input type="text" name="riddle" placeholder="Riddle" required>
        <input type="text" name="answer" placeholder="Answer" required>
        <input type="text" name="hint" placeholder="Hint" required>
        <input type="number" name="room_id" placeholder="Room ID (bijv. 1, 2 of 3)" required>
        
        <button type="submit">Save</button>
    </form>

    </body>
</html>