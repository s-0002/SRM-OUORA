<?php include "module.php";

$connection = connect_to_db("test");

extract($_POST);

$query = "SELECT likes FROM `answer` WHERE id = $ansid";


$result = "";
if(!($result = mysqli_query($connection, $query))){
    printf("Error: %s\n", mysqli_error($connection));
        exit();
}

while($row = mysqli_fetch_array($result)){
    echo $row[0];
}
?>