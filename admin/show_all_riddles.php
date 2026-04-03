<?php

require_once('../dbcon.php');

try {
    $stmt = $db_connection->query("SELECT * FROM riddles");
    $alle_raadsels = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Kan de database niet bereiken: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overview of All Riddles</title>
    <link rel="stylesheet" href="../css/home.css">
    
    <style>
        body {
            background-color: #222;
            color: white;
            font-family: sans-serif;
            padding: 40px;
            
            display: flex !important;
            flex-direction: column !important;
            align-items: stretch !important;
        }

        .admin-nav {
            margin-top: 30px; 
            margin-bottom: 20px;
            text-align: center; 
        }
        
        .admin-nav a {
            color: #f1c40f; 
            text-decoration: none;
            margin-right: 15px;
            font-size: 18px;
                font-family: 'Kalam', cursive; 

        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #333;
        }
        
        th, td {
            border: 1px solid #555;
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #444;
            color: #f1c40f;
        }
    </style>
</head>
<body>

    <h2>Overview of All Riddles in the Database</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Raadsel (Riddle)</th>
                <th>Antwoord (Answer)</th>
                <th>Hint</th>
                <th>Room ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alle_raadsels as $raadsel): ?>
                <tr>
                    <td><?= htmlspecialchars($raadsel['id']); ?></td>
                    <td><?= htmlspecialchars($raadsel['riddle']); ?></td>
                    <td><?= htmlspecialchars($raadsel['answer']); ?></td>
                    <td><?= htmlspecialchars($raadsel['hint']); ?></td>
                    <td><?= htmlspecialchars($raadsel['roomId']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="admin-nav">
        <a href="../index.php">Back to Home</a>
        <a href="add_riddle.php">Add New Riddle</a>
    </div>

</body>
</html>