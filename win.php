<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>You Win</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .win {
      position: relative;
      width: 100%;
      height: 100vh;
      background-image: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                        url("/SAAD-WALEED/images.jpeg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .content {
      position: absolute;
      top: 65%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      width: 90%;
    }

    .content h1 {
      color: #ca8e0d;
      font-size: 3rem;
      text-shadow: 0 0 10px black;
      margin-bottom: 25px;
    }

    #play {
      display: inline-block;
      padding: 16px 40px;
      background-color: #ff8c00;
      color: white;
      text-decoration: none;
      font-size: 1.3rem;
      font-weight: bold;
      border-radius: 10px;
      box-shadow: 0 0 10px black;
      transition: 0.3s;
    }

    #play:hover {
      background-color: #e67e00;
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .content h1 {
        font-size: 2rem;
      }

      #play {
        font-size: 1rem;
        padding: 12px 24px;
      }
    }
  </style>
</head>
<body>

  <div class="win">
    <div class="content">
      <h1>Gefeliciteerd! Je hebt gewonnen!</h1>
      <a id="play" href="/SAAD-WALEED/index.php">Back to home</a>
    </div>
  </div>

  <script src="Room.js"></script>
</body>
</html>