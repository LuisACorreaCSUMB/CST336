<?php

$keyword = "";
$category = "";
$error = false;
$keyword =$_GET["keyword"];
$category = $_GET["category"];
$layout = $_GET["layout"];

if ($keyword == ""  and $category == "")  {
    $error = true;
    echo "<div id='errorSubmit'>Please enter in a keyword or choose a category</div>";
}
else if ($keyword =="") {
   
    $keyword = $category;

}


    
?>