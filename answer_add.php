<?php include "connection.php";


if($_POST["insert"]){
    $ans = $_POST['answer'];
    
    $query = "INSERT INTO answer (answer)
VALUES ('".mysqli_real_escape_string($connection, $ans)."')";
    
    
    
    if(!mysqli_query($connection, $query)){
        echo "query failed". mysqli_error($connection);
    
    }
    ;
}


?>


<form action="" method="post">
   Type your Answer: <br><textarea name="answer" id="" cols="60" rows="5"></textarea><br>
   
    <input type="submit" name="insert" value="Insert">    
</form>