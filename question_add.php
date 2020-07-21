<?php include "connection.php";


if($_POST["insert"]){
    $que = $_POST['question'];
    
    $query = "INSERT INTO question (question) VALUES ('$que')";
    
    if(!mysqli_query($connection, $query)){
        echo "query failed";
    
    }
    ;
}


?>


<form action="" method="post">
   Type your Question: <br><textarea name="question" id="" cols="60" rows="5"></textarea><br>
   
    <input type="submit" name="insert" value="Insert">    
</form>