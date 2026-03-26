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

<div class="home">

    <div class="text">

        <h1>Welkom bij de Spy Escape Room!</h1>

        <p class="description">
            De escape room speelt zich af in een oud en verlaten huis waar een spion zich verstopt nadat hij geheime informatie heeft gestolen.<br><br>
            De politie heeft hem gevolgd en staat nu buiten het huis te wachten om hem te arresteren.<br><br>
            De speler moet binnen 5 minuten verschillende puzzels oplossen om een geheime uitgang te vinden en te ontsnappen voordat de politie binnenkomt.
        </p>

        <p class="team-text">
            Maak hier je team aan en start de Escape Room.
        </p>

        <form action="/SAAD-WALEED/admin/add_team.php" method="POST" class="team-form">
            <input type="text" name="team_name" placeholder="Teamnaam" required><br><br>
            <input type="text" name="member1" placeholder="Teamlid 1" required><br><br>
            <input type="text" name="member2" placeholder="Teamlid 2" required><br><br>
            <input type="text" name="member3" placeholder="Teamlid 3"><br><br>

            <button type="submit" class="play-btn">Nu Spelen</button>
        </form>

    </div>

    <img src="/SAAD-WALEED/thumbnai.png" class="thumbnail" alt="Spy Escape Room">

</div>

</body>
</html>