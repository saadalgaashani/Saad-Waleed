<?php
require_once('../dbcon.php');

try {
    $stmt = $db_connection->query("SELECT * FROM teams");
    $alle_teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Kan de database niet bereiken: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht Alle Teams</title>
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

    <h2>Alle Teams en Scores</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Teamnaam</th>
                <th>Lid 1</th>
                <th>Lid 2</th>
                <th>Lid 3</th>
                <th>Starttijd</th>
                <th>Score (Tijd in seconden)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alle_teams as $team): ?>
                <tr>
                    <td><?= htmlspecialchars($team['id'] ?? ''); ?></td>
                    <td><?= htmlspecialchars($team['team_name'] ?? ''); ?></td>
                    <td><?= htmlspecialchars($team['member1'] ?? ''); ?></td>
                    <td><?= htmlspecialchars($team['member2'] ?? ''); ?></td>
                    <td><?= htmlspecialchars($team['member3'] ?? ''); ?></td>
                    <td><?= htmlspecialchars($team['start_time'] ?? ''); ?></td>
                    
                    <td>
                        <?php 
                            if (!empty($team['time_score'])) {
                                echo htmlspecialchars($team['time_score']) . " sec";
                            } else {
                                echo "<em>Nog bezig...</em>";
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="admin-nav">
        <a href="../index.php">Terug naar Home</a>
        <a href="show_all_riddles.php">Bekijk alle raadsels</a>
    </div>

</body>
</html>