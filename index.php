<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spy Escape Room</title>

    <link rel="stylesheet" href="/SAAD-WALEED/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Bpmf+Huninn&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <nav> <a href="/SAAD-WALEED/admin/add_riddle.php">Add Riddle</a></nav>
   

<div class="home">

    <div class="text">

        <h1>Welcome to the Spy Escape Room!</h1>

        <p class="description">
            The escape room takes place in an old and abandoned house where a spy is hiding after stealing secret information.<br><br>
            The police have been following him and are now waiting outside the house to arrest him.<br><br>
            The player must solve different puzzles within 5 minutes to find a secret exit and escape before the police arrive.
        </p>

        <p class="team-text">
            Create your team here and start the Escape Room.
        </p>

        <form action="/SAAD-WALEED/admin/add_team.php" method="POST" class="team-form">
            <input type="text" name="team_name" placeholder="Teamnaam" required><br><br>
            <input type="text" name="member1" placeholder="Teamlid 1" required><br><br>
            <input type="text" name="member2" placeholder="Teamlid 2" required><br><br>
            <input type="text" name="member3" placeholder="Teamlid 3"><br><br>

            <button type="submit" class="play-btn">Play Now</button>
        </form>

    </div>

    <img src="/SAAD-WALEED/thumbnai.png" class="thumbnail" alt="Spy Escape Room">

</div>

</body>
</html>