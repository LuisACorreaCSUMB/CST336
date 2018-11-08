<?php
    $backgroundImage = "img/sea.jpg";

    include 'inc/functions.php';

    //API call goes here
    if($error == false){
        if (isset($_GET['keyword']) or isset($_GET['category'])) {
            include 'api/pixabayAPI.php';
            $imageURLs = getImageURLs($keyword);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        }
    }
?>
<!DOCTYPE html>
<html lang='en'>
    
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8";>
        <!-- Bootstrap links -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       
        <style>
            @import url("css/styles.css");
            body {
                background-image: url(<?=$backgroundImage?>);
                background-size:100% 100%;
            }
        </style>
    </head>
    
    <body>
        <br/> <br/>
        <?php
            if (!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
                
            }
            else {
                // Display Carousel Here
        ?>
        
        <div id="#carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            <ol class="carousel-indicators">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i===0)?" class='active'": "";
                        echo "></li>";
                    }
                ?>
            </ol>
            <!-- Wrapper for Images -->
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        do { 
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="carousel-item';
                        echo ($i===0)?" active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>    
            </div>
            
            <!-- Controls Here -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
             </a>
        </div>
        <?php
            }//end of the Else Statement
        ?>
        <br>
        <!-- HTML form goes here! -->
        <form id='search' method='get'>
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
            <br><br>
            <div id='layoutDiv'>
                <input type="radio" id = "lhorizontal" name="layout" value="horizontal">
                <label for = "Horizontal"></label><label for="lhorizontal"> Horizontal </label>
                <input type="radio" id = "lvertical" name="layout" value="vertical">
                <label for = "Vertical"></label><label for="lvertical"> Vertical </label>
            </div>
            <br><br>
            <select name = "category">
                <option value>Select One</option>
                <option value="cars">Cars</option>
                <option value="skateboards">Skateboards</option>
                <option value="bikes">Bikes</option>
                <option value="planes">Planes</option>
                <option value="boats">Boats</option>
            </select>
            <br>
            <input type="submit" value="Submit" />
        </form>
        <br/> <br/>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>