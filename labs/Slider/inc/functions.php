<?php

$keyword = "";
$category = "";

$keyword = $_GET["keyword"];
$category = $_GET["category"];
$layout = $_GET["layout"];

if ($keyword == ""  and $category == "")  {
    echo "<div id='errorSubmit'>Please enter in a keyword or choose a category</div>";
}

//if ($layout = "horizontal"){
    #carousel-example-generic.css('display':'ve')
//}
//else{
//}











?>