<hmtl>
<head>
   <link type="text/css" rel="stylesheet" href="main.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
   <?php
      $steamidlink = $_GET['Steamid'];
      $id = $_GET[steamID];
      $error = $_GET[error];
      
      $profile_url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=A0497CA846C238899BD478B7F2BE36DF&steamids=' . $steamidlink;
      $profile_json = file_get_contents($profile_url);
      $profile_array = json_decode($profile_json, true);	
      
      $profileName = $profile_array['response']['players'][0]['personaname'];
      $profileURL = $profile_array['response']['players'][0]['profileurl'];
      $profileAvatar = $profile_array['response']['players'][0]['avatarfull'];
      
      	
      $game_url = 'http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=A0497CA846C238899BD478B7F2BE36DF&steamid='. $steamidlink;
      $game_json = file_get_contents($game_url);
      $game_array = json_decode($game_json, true);
      
      
      $x = 0;
      while($x < 195 ){
      	$playerstat[$x] = $game_array['playerstats']['stats'][$x]['value'];
      	$x++;
      }
      ?>
   <div class="mycard">
      <h1>
         <?php echo $profileName;?>
      </h1></br>
      <img src="<?php echo $profileAvatar ?>">  
      <h2> Profile URL </h2>
	  <form method="get" action="<?php echo $profileURL ?>">
    <button class="btn btn-outline-primary" type="submit">Go To Profile</button>
</form>
       
      <br></br>
   </div>
   <div class=container4>
      <p>Your CS:GO Stats
   </div>
   <div class=container><div class="row">
    <div class="col-sm">

   <div class="media">
   <div class="media-left">
      <img class="media-object" style="height:70px;" src="images/win.jpg" alt="">
      </a>
   </div>
   <div class="media-body">
      <h4 class="media-heading" style="font-size:20px;">
         <p>Total Wins: <?php echo $playerstat[5];?></p>
      </h4></div></div>
      </br>	<div class="media">
         <div class="media-left">
            <img class="media-object" style="height:70px;" src="images/time.jpg" alt="">
            </a>
         </div>
         <div class="media-body">
            <h4 class="media-heading" style="font-size:20px;">
               <p>Time Played: <?php $time = intval(($playerstat[2])/3600); echo $time;?> hours</p>
            </h4>
         </div>
      </div>
      </br>
	  <div class="media">
         <div class="media-left">
            <img class="media-object" style="height:80px;" src="images/mvp.jpg" alt="">
            </a>
         </div>
         <div class="media-body">
            <h4 class="media-heading" style="font-size:20px;">
               <p>Total MVPs: <?php echo $playerstat[101];?></p>
            </h4>
         </div>
      </div></div>
    <div class="col-6 col-md-4">

	  <div class="media">
         <div class="media-left">
            <img class="media-object" style="height:70px;" src="images/kills.jpg" alt="">
            </a>
         </div>
         <div class="media-body">
            <h4 class="media-heading" style="font-size:20px;">
               <p>Total Kills: <?php echo $playerstat[0];?></p>
            </h4>
         </div>
      </div></br>
	  <div class="media">
         <div class="media-left">
            <img class="media-object" style="height:70px;" src="images/accuracy.jpg" alt="">
            </a>
         </div>
         <div class="media-body">
            <h4 class="media-heading" style="font-size:20px;">
               <p>Accuracy: <?php $accuracy = intval ((($playerstat[45])/($playerstat[46]))*100); echo $accuracy;?>%</p>
            </h4>
         </div>
      </div></br>
	<div class="media">
         <div class="media-left">
            <img class="media-object" style="height:70px;" src="images/headshot.jpg" alt="">
            </a>
         </div>
         <div class="media-body">
            <h4 class="media-heading" style="font-size:20px;">
		<p>Total Headshots: <?php  $headshots = intval ((($playerstat[25])/($playerstat[0]))*100); echo $headshots;?>%</p>
                         </h4>
         </div>
      </div>
	  </div>
    
</div>
   </div>

    <div class=container4>
      <p>Kills With Weapons
   </div>
   <div class=container><div class="row">
   <div class="col-sm">
   
	<canvas id="barChart"></canvas>
   
   </div>
   </div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script>	
const CHART = document.getElementById("barChart");
console.log(CHART);
let barchart = new Chart(CHART,{
	type: 'bar',
	data: {
		labels:["AWP", "M4A4", "USP","Glock","Five Seven","Deagle","P250","Knife","HE","Molotov"],
		datasets: [
		{label: "Weapons",
			backgroundColor:"rgb(0, 123, 255)",
		data: [<?php echo $playerstat[19];?>,<?php echo $playerstat[162];?>,<?php echo $playerstat[121];?>,<?php echo $playerstat[11];?>,<?php echo $playerstat[14];?>,<?php echo $playerstat[12];?>,<?php echo $playerstat[125];?>,<?php echo $playerstat[9];?>,<?php echo $playerstat[10];?>,<?php echo $playerstat[164];?>]
}]}}
		)</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</body>
</html>