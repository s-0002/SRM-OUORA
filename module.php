<?php

function connect_to_db($db){
    

        $connection = mysqli_connect("localhost", "root", "", "$db");   
        
    if(!$connection){
            echo "Connection Failed";
        }
    
    return $connection;
}

function get_answer($qid, $connection){
    
    //$connection = connect_to_db("test");
    $answer = array(); 
    $query = "SELECT * FROM answer WHERE qid = $qid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    while($row = mysqli_fetch_array($result)){
        array_push($answer, $row['answer']);
    }
    
    return $answer;
       
}

function isEmpty($qid, $connection){
    
    //$connection = connect_to_db("test");
    $answer = array(); 
    $query = "SELECT * FROM answer WHERE qid = $qid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    while($row = mysqli_fetch_array($result)){
        array_push($answer, $row['answer']);
    }
    
    if(count($answer)>0){
        return false;   
    }
       return true;
}


function get_answerid($qid, $connection){
    
    //$connection = connect_to_db("test");
    $answer = array(); 
    $query = "SELECT * FROM answer WHERE qid = $qid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    while($row = mysqli_fetch_array($result)){
        array_push($answer, $row['id']);
    }
    
    return $answer;
       
}

function get_answer_likes($qid, $connection){
    
     $likes = array(); 
    $query = "SELECT * FROM answer WHERE qid = $qid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    while($row = mysqli_fetch_array($result)){
        array_push($likes, $row['likes']);
    }
    
    return $likes;
}

function get_answer_dislikes($qid, $connection){
    
     $dislikes = array(); 
    $disquery = "SELECT * FROM answer WHERE qid = $qid";
    $result = mysqli_query($connection, $disquery);
    if(!$result){
        echo "query failed";
    }
    
    while($row = mysqli_fetch_array($result)){
        array_push($dislikes, $row['dislikes']);
    }
    
    return $dislikes;
}

//For now its only for answers table.

function get_user_id($table, $id, $connection){
    
 //   $connection = connect_to_db("test");
    $array = array(); 
    $query = "SELECT userid FROM $table WHERE qid = $id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    while($row = mysqli_fetch_array($result)){
        array_push($array, $row[0]);
    }
    
    return $array;
    
    
}

function get_username($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT user FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function get_city($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT `city` FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function get_state($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT `state` FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function get_DOB($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT `dob` FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function get_mobile($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT `mobile` FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function get_accreatedon($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT `createdOn` FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function get_email($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT `email` FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function get_fullname($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT * FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row["firstname"]." ".$row["lastname"];

}

function get_firstname($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT * FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row["firstname"];

}

function get_designation($userid, $connection){
 //   $connection = connect_to_db("test");
    
    $query = "SELECT * FROM login WHERE id = $userid";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
    
    return $row["designation"];

}

//It should be changed to "fetch userID from email"

function get_id_from_name($name, $connection){
    
  //      $connection = connect_to_db("test");
    
    $query = "SELECT id FROM login WHERE user = '$name'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        printf("Error: %s\n", mysqli_error($connection));
        exit();
    }
    
    
    $row = mysqli_fetch_array($result);
    
    return $row[0];

}

function add_question($id, $question, $connection){
    
    $query = "INSERT INTO question (question, userid) VALUES ('$question', $id)";
    if(!mysqli_query($connection, $query)){
        printf("Error: %s\n", mysqli_error($connection));
        exit();
        
        return false;
    }
    return true;
    
}


//////For Answers By default


function isLiked($ansid, $userid, $table, $connection){
    
    $query = "SELECT * FROM $table WHERE `answer` = $ansid AND `user` = $userid AND `action` = 'like'";
    $result = "";
    if(!($result = mysqli_query($connection, $query))){
        printf("Error: %s\n", mysqli_error($connection));
        exit();   
    }
    
    if(mysqli_num_rows($result)>0){
        return true;
    } 
    
    return false;
    
    
}


function isdisLiked($ansid, $userid, $table, $connection){
    
    $query = "SELECT * FROM $table WHERE `answer` = $ansid AND `user` = $userid AND `action` = 'dislike'";
    $result = "";
    if(!($result = mysqli_query($connection, $query))){
        printf("Error: %s\n", mysqli_error($connection));
        exit();   
    }
    
    if(mysqli_num_rows($result)>0){
        return true;
    } 
    
    return false;
    
    
}

//Get Profile Pic of user.


function getDP($userid, $connection){
    
    $query = "SELECT `dp` FROM login WHERE `id`=$userid";
    $result="";
    if(!($result=mysqli_query($connection, $query))){
        printf("Error: %s\n", mysqli_error($connection));
        exit();   
    }
    
    $result = mysqli_fetch_array($result)[0];
    
    return $result;
}

function get_queAsked($userid, $connection){
     $query = "SELECT * FROM question WHERE `userid`=$userid";
    $result="";
    if(!($result=mysqli_query($connection, $query))){
        printf("Error: %s\n", mysqli_error($connection));
        exit();   
    }
    
    return mysqli_num_rows($result);
}

function get_ansPosted($userid, $connection){
     $query = "SELECT * FROM answer WHERE `userid`=$userid";
    $result="";
    if(!($result=mysqli_query($connection, $query))){
        printf("Error: %s\n", mysqli_error($connection));
        exit();   
    }
    
    return mysqli_num_rows($result);
}

function get_queAskedDate($qid, $connection){
     $query = "SELECT `dateAsked` FROM question WHERE `id`=$qid";
    $result="";
    if(!($result=mysqli_query($connection, $query))){
        printf("Error: %s\n", mysqli_error($connection));
        exit();   
    }
    
    return mysqli_fetch_array($result)[0];
}


function get_answerpostedon($ansid, $connection){
    
    //$connection = connect_to_db("test");
    $query = "SELECT `postedOn` FROM answer WHERE `id` = $ansid";
    $result = "";
    if(!($result = mysqli_query($connection, $query))){
        echo "query failed";
    }
    
    $row = mysqli_fetch_array($result);
       
    
    return $row[0];
       
}
?>