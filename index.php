<hmtl>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
   <section class="jumbotron text-center pb-2">
   <h1 class="display-3">CS:GO Analytics</h1>
   <p class="lead">View and share your in-depth CS:GO statistics played CS:GO matchmaking.</p>
   <div style="margin-top:10px; max-width: 600px;" class="container">
      <div class="alert alert-danger">
         <p>You can only search for statistics if you own the game and your profile is set to public.</p>
      </div>
      </br>
      <table style="height: 100px;">
         <tbody>
            <tr>
               <td class="align-middle">
                  <h2>Enter your steam ID below</h2>
                  <form action="stats.php">
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" "align-middle" id="basic-addon3">https://steamcommunity.com/id/</span>
                        </div>
                        <input type="text" class="form-control" name="Steamid" id="basic-url" aria-describedby="basic-addon3">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                  </form>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>