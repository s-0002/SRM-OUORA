<?php include "module.php";

$connection = connect_to_db("test");
extract($_POST);



/////////////

if(isLiked($ansid, $userid, "answers_like", $connection)){
    $delete = "DELETE FROM `answers_like` WHERE `answer` = $ansid AND `user` = $userid AND `action` = 'like'";
      if(!($result = mysqli_query($connection, $delete))){
            printf("Error: %s\n", mysqli_error($connection));
                exit();
        }           
}else{
        $query = "INSERT INTO answers_like (answer, user, action) VALUES ($ansid, $userid, 'like')";


        if(!($result = mysqli_query($connection, $query))){
            printf("Error: %s\n", mysqli_error($connection));
                exit();
}

}


///////////////
$query1 = "SELECT * FROM `answers_like` WHERE answer = $ansid AND `action` = 'like'";

if(!($result = mysqli_query($connection, $query1))){
    printf("Error: %s\n", mysqli_error($connection));
        exit();
}

$likes = mysqli_num_rows($result);


$query2 = "UPDATE `answer` SET `likes` = $likes WHERE id = $ansid";

if(!($result = mysqli_query($connection, $query2))){
    printf("Error: %s\n", mysqli_error($connection));
        exit();
}



?>