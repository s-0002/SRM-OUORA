<?php include "module.php";

$connection = connect_to_db("test");
extract($_POST);



/////////////

if(isdisLiked($ansid, $userid, "answers_like", $connection)){
    $delete = "DELETE FROM `answers_like` WHERE `answer` = $ansid AND `user` = $userid AND `action` = 'dislike'";
      if(!($result = mysqli_query($connection, $delete))){
            printf("Error: %s\n", mysqli_error($connection));
                exit();
        }           
}else{
        $query = "INSERT INTO answers_like (answer, user, action) VALUES ($ansid, $userid, 'dislike')";


        if(!($result = mysqli_query($connection, $query))){
            printf("Error: %s\n", mysqli_error($connection));
                exit();
}

}


///////////////
$query1 = "SELECT * FROM `answers_like` WHERE answer = $ansid and action = 'dislike'";

if(!($result = mysqli_query($connection, $query1))){
    printf("Error: %s\n", mysqli_error($connection));
        exit();
}

$dislikes = mysqli_num_rows($result);


$query2 = "UPDATE `answer` SET `dislikes` = $dislikes WHERE id = $ansid";

if(!($result = mysqli_query($connection, $query2))){
    printf("Error: %s\n", mysqli_error($connection));
        exit();
}




?>