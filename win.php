<!DOCTYPE html>
<html lang="en">
<head>
    <style>

        body{
        margin:0;
           font-family:Arial, Helvetica, sans-serif;
           }
        .win{
            position:relative;
  width:100vw;
  height:100vh;
  overflow:hidden;

              }
              .win img{
               position:relative;
  width:100vw;
  height:100vh;
  overflow:hidden;
              }
       

        .content{
            position:absolute;
          top:80%;
              left:50%;
         transform:translateX(-50%);
     color:white;
      z-index:10;
        text-shadow:0 0 10px black;
         
        }
        h1{
            color: #ca8e0ddc;
        }

        #play{
        position: center;
          padding: 12px 18px;
          background: #ff8c00;  
             color: #fff;
      border-radius: 8%;
         font-weight: bold;
         width: 250%;
         top: 8%;
         text-decoration: none;
     }
        
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="win">
        <img src="/SAAD-WALEED/images.jpeg" alt="">
    <div class="content">
        <h1> "Gefeliciteerd! Je hebt gewonnen!"</h1>
        <a id="play" href="/SAAD-WALEED/index.php">Restart</a>
         
    </div>
</div>
     <script src="Room.js" ></script>
</body>
</html>