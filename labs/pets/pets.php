<script>

    $(document).ready( function(){
        
        $(".petLink").click( function(){
            
            
            $('#petInfoModal').modal("show");
            $("#petInfo").html("<img src='img/loading.gif'>");
            
            $.ajax({
                
                type: "GET",
                url: "api/getPetInfo.php",
                dataType: "json",
                data: { "id": $(this).attr('id')},
                success: function(data,status) {
                    
                    $("#petInfo").html(" <img src='img/" + data.pictureURL + "'><br >" +
                                        " Age: " + data.age + "<br>" +
                                        " Breed: " + data.breed + "<br>" +
                                        data.description);
                                        
                },
                complete: function(data,status) {
                   //alert(status); 
                }
                
            });//ajax    
            
        });//.petLink click
        
    });//document.ready
    
</script>
<?php


    function getPetList(){
        include 'dbConnection.php';
        $conn = getDatabaseConnection("pets");
        
        
        $sql = "SELECT *
                FROM pets";
         
                
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $record;
    }
$pets = getPetList();

foreach($pets as $pet){
    echo "Name: ";
    echo "<a href='#' class='petLink' id='".$pet['id']."' >". $pet['name'] . "</a><br>";
    echo "Type: " . $pet['type'] . "<br>";
    echo "<button id='".$pet['id']."' type='button' class='btn btn-primary petLink'>Adopt Me!</button>";
    echo "<br><br>";
    
}
    
?>
