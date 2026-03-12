<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-image:url('images.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            
        }

        .content{
            text-align: center;
            padding-top: 450px;
            color: #B8860B;
            font-size: 40px;
         
        }

        .content button{
            color: #B8860B;
            font-size: 30px;
            border: none;
            border-radius: 60px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
             transition: 0.3s;
           

        }
        
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <h1> "Gefeliciteerd! Je hebt gewonnen!"</h1>
        <button onclick="restartGame()" class="restart"> Restart</button>
         
    </div>
     <script src="Room.js" ></script>
</body>
</html>