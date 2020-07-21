<?php include_once "module.php";
session_start();
$connection=connect_to_db("test");
$a = "";
date_default_timezone_set('Asia/Kolkata');

if(array_key_exists('username', $_SESSION) || array_key_exists('id', $_SESSION)){
    $a = $_SESSION['username'];


$userid = $_SESSION["id"];
$firstname = get_firstname($userid, $connection);
    
     
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <style type="text/css">
        .main .submain{
            background-color: white;
            border-radius: 2px;
            padding: 12px;
            border: 0.5px solid silver;
        }
        .main .submain a{
            text-decoration: none;
            color: black;
        }
        .submain a:hover{
            text-decoration: underline;
        }
        
        .name{
            display: flex;
        }
        .name img{
            width: 40px;
            border-radius: 20px;
        }
        body{
            background-color: coral;
        }
        
        .fa-edit:hover{
            color: red !important;
        }
        
        #current{
            color: purple;
            border-bottom: 2px solid purple;
        }
        
        .navbar-nav > li{
          padding-left:5px;
          padding-right:5px;
        }
        
        .navbar-nav > li{
          margin-left: 5px;
          margin-right:5px;
        }
        
    .navbar {
        -webkit-box-shadow: 0 8px 6px -6px #999;
        -moz-box-shadow: 0 8px 6px -6px #999;
        box-shadow: 0 8px 6px -6px #999;

        /* the rest of your styling */
    }
        
        navbar .dropdown-menu {
            width: 250px !important;
        }
        
        .questionshow{
            font-family: 'Merriweather', serif;
            font-size: 25px;
        }
        
        .name img{
            width: 45px;
            height: 50px;
            border-radius: 20px;
            border: 2px groove;
        }

    </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">
  <link href="font-awesome/css/all.css" rel="stylesheet">
</head>
<body>

<!------Navbar---------->
<navbar class="navbar navbar-expand-xl navbar-light bg-white sticky-top p-0">
   <div class="container custom-container">
      
       <a class="navbar-brand" href="#"><img width="75"src="sdfd.png" alt=""></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#responsive">
           <span class="navbar-toggler-icon"></span>
       </button>
       
       <div class="collapse navbar-collapse" id="responsive">
           <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                   <a href="redirect.php" class="nav-link"><i class="fas fa-home fa-lg"></i> HOME</a>
               </li>
               <li class="nav-item">
                   <a id="current" href="que_asked.php" class="nav-link"><i class="far fa-question-circle fa-lg"></i> QUESTIONS ASKED BY ME</a>
               </li>
               <li class="nav-item">
                   <a href="notifications.php" class="nav-link current"><i class="fas fa-bell fa-lg"></i> NOTIFICATIONS</a>
               </li>
               
               
               <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" style="width: 200px;" type="search" placeholder="Search SRM Quora" aria-label="Search">
                  
                </form>
                
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                           <img width= "25px"class="rounded-circle" src="<?php echo getDP($userid, $connection); ?>" alt="" >
                           
                    </a>
                    <div class="dropdown-menu p-3" style="width:170px">
                           <img width= "30px"class="rounded-circle mr-2" src="<?php echo getDP($userid, $connection); ?>" alt="" >
                           <span class="font-weight-bold"><?php echo get_fullname($userid, $connection);?></span>
                           <hr>
                            <a class="dropdown-item my-1" href="profile.php"><i class="fas fa-user mr-2"></i>My Profile</a>
                            <a class="dropdown-item my-1" href="#"><i class="far fa-bookmark mr-2"></i>Bookmarks</a>
                            <a class="dropdown-item my-1" href="#"><i class="fas fa-users mr-2"></i>Followers</a>
                            <hr>
                            <a href='logout.php?signout=1'><button id="btn" class="btn btn-outline-primary btn-sm" type="submit">Log Out</button></a>
                      </div>
  
               </li>
               
               <li class="nav-item" >
                   <a href="" data-toggle="modal" data-target="#myModal"class="btn btn-sm mt-2 btn-primary"><i class="fas fa-plus"> Add Question</i></a>
               </li>
           </ul>
           
       </div>
       
   </div>
    
</navbar>
<div class="container p-3 my-3 border w-50" >
     <h2 class="font-weight-bold">Questions asked by me:</h2>
</div>   
<!-------------------------------------------------------------------------------------------------------------------->           
   
  <!-------------------------------------------------------------------------------------------------------------------->                 
                
                 
<div class="container p-3 my-3 border w-50">


 


  
  <!---------------------------------------------------------------------------------------------------------------------->
  
  
  

                                    
                                    <?php 
                                           
                                            $q1 = "SELECT * FROM question WHERE `userid` = $userid";
                                            if(!($result = mysqli_query($connection, $q1))){echo "query Failed";}
                                            while($row = mysqli_fetch_array($result)){
                                                $queuserid = $row['userid'];
                                                $qid = $row['id'];
                                                                    ?>
                
                
                <div class="submain">
                   <div class="name mt-5 mb-2">
                        <img src="<?php echo getDP($queuserid, $connection)?>" alt=""><p style="margin-left:10px;"> 
                        <?php echo get_fullname($row['userid'], $connection).", ".get_designation($row['userid'], $connection) ?><br>
                        <span style="color: grey; font-size: 15px;;">Asked on <?php echo get_queAskedDate($qid,$connection)?>, 2020</span>
                        </p>
                    
                    </div>
                   <div>
                    
                    <h2><a href="" class="text-dark questionshow"><?php echo $row['question']; ?></a></h2><br>
                    </div>
                    
                    
                                                <?php
                                                
                                                //$q2 = "SELECT * FROM question WHERE userid = $id";
                                              
                                                //$row_que = mysqli_fetch_array(mysqli_query($connection, $q2));
                                                //$uid= $row_que['userid'];
                                                
                                                   ?>
                                                   
                                                  
                    
                   
        <!-------------------------------- Answer--------------------------------------------------->
                    <div>
                    
                    <?php if(!isEmpty($qid, $connection)){?>
                    <p style="margin-top: 15px;">
                        <?php 
                                                
                                                
                            $i=0;
                            while($i<count(get_answer($qid, $connection))) {
                                
                                 $userid= get_user_id("answer", $qid, $connection);
                                $ansid = get_answerid($qid, $connection);
                                    $likes = get_answer_likes($qid, $connection);
                                $dislikes = get_answer_dislikes($qid, $connection);
                                echo "<h6>".get_fullname($userid[$i], $connection).",
                                <small>".get_designation($row['userid'], $connection)."</small></h6>
                                <small class='mt-0 font-italic'>Posted on ".get_answerpostedon($ansid[$i], $connection)."</small><br>";
                                
                                
                                ?>
                                
                                
                               
                                
                                
                                <?php
                                        
                                        echo get_answer($qid, $connection)[$i]."<br>";
                                        
                                  ?>
                                
                                 <!--lIKE bUTTON. Working correct....--->
                              <br>  
                            <span class="like" onclick="like(<?php echo $ansid[$i]; ?>)">
                                   <i class="far fa-thumbs-up"></i></span>
                                   
                                    <span id="<?php echo $ansid[$i].'like'; ?>"><?php echo $likes[$i]; ?></span>
                                    
                                <!--------//...........--->
                                
                                
                                <!--dislIKE bUTTON. Working correct....--->
                                
                            <span class="dislike" onclick="dislike(<?php echo $ansid[$i]; ?>)">
                                   <i class="far fa-thumbs-down"></i></span>
                                   
                                    <span id="<?php echo $ansid[$i].'dislike'; ?>"><?php echo $dislikes[$i]; $i++;
                                  ?></span>
                                    
                                <!--------//...........--->
                                
                            <!--dislIKE bUTTON. Working correct....--->
                                
                            <span class="" onclick="">
                                   <i class="far fa-edit"></i></span>
                                   
                                    <span id=""></span>
                                    
                                <!--------//...........--->    
                                
                                
                    </p>
                    <hr>
                    <?php }?>
                    <?php echo '<p class="font-weight-bold font-italic small">'.count(get_answer($qid, $connection))." people answered this question.".'</p>'; ?>
                    <span class="lead">Do you want to answer? Click this icon</span>
                                    <span data-toggle="modal" data-target="#ansModalfirst" class="" onclick="">
                                   <i class="btn fa-lg far fa-edit"></i>
                                   </span>
                                   
                                   
                                   
                                   
            <!--------------------------------------------------------------------------------------------------------------------                    ITS PENDING I HAVE TO DO
                                                       
                         <!-- The Answer Modal ---
                <div class="modal" id="ansModalfirst">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                  </div>
                </div>      --->
<!--------------------------------------------------------------------------------------------------------------------> 
                                   
                    <?php }else{
                        echo '<hr>';
                        echo '
                            
                                    <div class="btn">
        <h4 class="font-weight-bold text-muted text-sm">No Answers have been Posted yet.</h4>
                                </div>
                           
                                    '; ?>
                                    
  <!-------------------------------------------------------------------------------------------------------------------->                 
              
<!-------------------------------------------------------------------------------------------------------------------->   
                     <?php   }
                        ?>
                    <hr style="height: 12px;"/>
                    <?php }?>
                    

                   </div>
                </div>
                
                

<!-------------------------------------------------------------------------------------------------------------------------------->


<?php
    $userid = get_id_from_name($a, $connection);
    if(isset($_POST['submit'])){
         $question = mysqli_real_escape_string($connection, $_POST['question']);
            if(!add_question($userid, $_POST['question'], $connection)){
                echo "Question not added successfully!!";
            }
        }
    
    ?>
   
   
   
   
   
  
 </div>
    
</body>




<script type="text/javascript">
    /////////////////////For lIKE System////////////////////////////////////////////////////////
       var userid=<?php echo $userid; ?>;
      
    
    function like(id){
         var ansid = id;
        $.ajax({
            url :  "like_insert.php",
            type : "POST",
            data : {
                    userid : userid,
                    ansid : id
                    },
            
            success : function(data){
                    like_show(ansid);
            } 
        });
    }
    
                        function like_show(id){

                            var ansid = id;

                            $.ajax({
                                url :  "like_show.php",
                                type : "POST",
                                data : {
                                        ansid : ansid     
                                },

                                success : function(data){
                                    $("#"+ansid+"like").html(data);
                                } 
                            });
                        }
    

    function dislike(id){
         var ansid = id;
        $.ajax({
            url :  "dislike_insert.php",
            type : "POST",
            data : {
                    userid : userid,
                    ansid : id
                    },
            
            success : function(data){
                    dislike_show(ansid);
            } 
        });
    }
    
    
                            function dislike_show(id){

                                var ansid = id;

                                $.ajax({
                                    url :  "dislike_show.php",
                                    type : "POST",
                                    data : {
                                            ansid : ansid     
                                    },

                                    success : function(data){
                                        $("#"+ansid+"dislike").html(data);
                                    } 
                                });
                            }
    
    ///////////////////////// LIKE SYSTEM OVER /////////////////////////////////////////////
    
    
    
</script>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>


<?php 



}else{ header("location: quora.html");}?>