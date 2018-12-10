<?php
    // Start the session
    session_start();
    
    // Verify if the user is logged on.
    if(!(isset($_SESSION['username']))) {
        header('Location: ./index.php');
    }
    
    // Include the database api
    include "../database_api.php";
    // Get the conn
    $conn = getDBConnection();
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Heroes 4 Hire Admin Page</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
    </head>
    <body>
        
        <!-- **************************** Boostrap Navbar ********************************************************************************** -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="../admin.php">Heroes 4 Hire <strong>Admin Page</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./adminHeroes.php">Heroes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./adminTaW.php">Tools And Weapons</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="./adminAnalytics.php">Analytics</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-danger" href="../userlogin/logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- ****************************************************************************************************************************** -->
        
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-2">Welcome <?= $_SESSION['username']; ?>!</h1>
                <div id="editingMessage" class="display-5">Here are the analytics!</div>
            </div>
        </div>
        
        <!-- Bootstrap Cards of the Data -->
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hero Count</h5>
                    <p class="card-text">Amount of Heroes: <?= getHeroCount(); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tool And Weapon Count</h5>
                    <p class="card-text">Amount of Tools and Weapons: <?= getToolAndWeaponCount(); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Average Hero Price</h5>
                    <p class="card-text"><?= getAverageHeroPrice(); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Average Tool and Weapon Price</h5>
                    <p class="card-text"><?= getAverageToolAndWeaponPrice(); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Most Expensive Hero</h5>
                    <p class="card-text"><?= getMostExpensiveHero(); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Most Expensive Tool And Weapon</h5>
                    <p class="card-text"><?= getMostExpensiveToolAndWeapon(); ?></p>
                </div>
            </div>
        </div>
        
      
      <!-- Scripts -->
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Custom JavaScript -->
      <script type="text/javascript" src="../js/admin.js"></script>
    </body>
</html>