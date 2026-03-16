<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>You Lost</title>
<link href="https://fonts.googleapis.com/css2?family=Bpmf+Huninn&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family: "Bpmf Huninn", sans-serif;
  font-weight: 400;
  font-style: normal;}

.lose{
position:relative;
  width:100vw;
  height:100vh;
  overflow:hidden
}

.lose img{
 width:100%;
  height:100%;
  display:block;


}


.content{
position:absolute;
top:65%;
left:50%;
transform:translate(-50%,-50%);
text-align:center;
width:90%;
}

.content h1{
color:white;
font-size:3rem;
text-shadow:0 0 10px black;
margin-bottom:25px;
}

#play{
display:inline-block;
padding:16px 40px;
background:#ff8c00;
color:#fff;
text-decoration:none;
font-size:1.3rem;
font-weight:bold;
border-radius:10px;
box-shadow:0 0 10px black;
transition:0.3s;
}

#play:hover{
background:#e67e00;
transform:scale(1.05);
}

@media (max-width:768px){

.content h1{
font-size:2rem;
}

#play{
font-size:1rem;
padding:12px 24px;
}

}

</style>
</head>

<body>

<div class="lose">
    <img src="/SAAD-WALEED/verpagina.jpg" alt="verlies foto">

<div class="content">
<h1>Helaas, volgende keer beter!</h1>

<a id="play" href="/SAAD-WALEED/rooms/room-1.php">
Restart
</a>

</div>

</div>

</body>
</html>