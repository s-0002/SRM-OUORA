<?php include_once "module.php";
session_start();

$connection=connect_to_db("test");
$a = "";

if(array_key_exists('user', $_SESSION)){
    $a = $_SESSION['user'];
echo "Hello $a";}

$userid = get_id_from_name($a, $connection);
echo $userid;

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
    </style>
    <script src="https://kit.fontawesome.com/fddb1adee8.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <h1>Questions asked By you:</h1>
  
  <!---------------------------------------------------------------------------------------------------------------------->
  
  
  

                                    
                                    <?php 
                                           
                                            $q1 = "SELECT * FROM question WHERE userid = $userid";
                                            if(!($result = mysqli_query($connection, $q1))){echo "query Failed";}
                                            while($row = mysqli_fetch_array($result)){
                                                                    ?>
                
                
                <div class="submain">
                    <p style="color: grey; font-size: 12px;">Category: Infectious Diseases</p>
                    <h2><a href=""><?php echo $row['question']; ?></a></h2><br>
                    
                    
                    
                                                <?php $qid = $row['id']; 
                                                
                                                //$q2 = "SELECT * FROM question WHERE userid = $id";
                                              
                                                //$row_que = mysqli_fetch_array(mysqli_query($connection, $q2));
                                                //$uid= $row_que['userid'];
                                                
                                                   ?>
                                                   
                                                   
                                                   
                    <div class="name">
                        <img src="pp.jpg" alt=""><p style="margin-left:10px;"> 
                        <?php echo get_username($row['userid'], $connection);?>, Prof Biology, UC Berkley <br>
                        <span style="color: grey; font-size: 15px;;">Updated 30th March 2020.</span>
                        </p>
                    
                    </div>
                    
                    
                    <!---- Answer-------->
                    
                    <p style="margin-top: 15px;">
                        <?php 
                                                
                                                
                            $i=0;
                            while($i<count(get_answer($qid, $connection))) {
                                
                                $userid= get_user_id("answer", $qid, $connection);
                                $ansid = get_answerid($qid, $connection);
                                    $likes = get_answer_likes($qid, $connection);
                                echo "<h3>".get_username($userid[$i], $connection)."</h3>";
                                
                                
                                ?>
                                
                                
                                <!--lIKE bUTTON. Working correct....--->
                                
                            <button class="like" onclick="like(<?php echo $ansid[$i]; ?>)"><i class="far fa-thumbs-up"></i></button>
                                    <span id="<?php echo $ansid[$i]; ?>"><?php echo $likes[$i] ?></span>
                                    
                                <!--------//...........--->
                                
                                
                                <?php
                                echo get_answer($qid, $connection)[$i]."<br>";
                                $i++;
                                }}   ?>
                                
                                
                                
                        <a class="collapsible" href="">(more)</a><br><br>
                        <i class="fas fa-share" > </i> 800+&nbsp;&nbsp;<i class="far fa-heart"> 252+</i>&nbsp;&nbsp;<i class="far fa-comments"> 252+</i>
                    </p>

                   
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
   
   
   
   
   <h2>Ask your Question:</h2>
    <form action="" method="post">
        <textarea name="question" id="" cols="100" rows="10"></textarea><br><br>
        <input type="submit" name="submit" value="Ask Question">
    </form>
  
 
    
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
                    show(ansid);
            } 
        });
    }
    
    
    function show(id){
        
        var ansid = id;
        
        $.ajax({
            url :  "like_show.php",
            type : "POST",
            data : {
                    ansid : ansid     
            },
            
            success : function(data){
                $("#"+ansid).html(data);
            } 
        });
    }
    
    ///////////////////////// LIKE SYSTEM OVER /////////////////////////////////////////////
    
    
    
</script>
</html>
