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
</head>
<body>
  
  

                                    <?php include "module.php";
                                           
                                            $connection=connect_to_db("test");
                                            $q1 = "SELECT * FROM question";
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
                            while($i<count(get_answer($qid, $connection)) 
                                  and $i<count($userid= get_user_id("answer", $qid, $connection))){
                                
                                echo "<h3>".get_username($userid[$i], $connection)."</h3>";
                            
                                echo get_answer($qid, $connection)[$i]."<br>";
                                $i++;
                                }}   ?>
                                
                                
                                
                        <a class="collapsible" href="">(more)</a><br><br>
                        <i class="fas fa-share" > </i> 800+&nbsp;&nbsp;<i class="far fa-heart"> 252+</i>&nbsp;&nbsp;<i class="far fa-comments"> 252+</i>
                    </p>

                   
                </div>

            
            <br><br>
            
            
        <form method="post" action="validation.php">
               Username <input type="text" name="user"><br>
                Password<input type="password" name="pass"><br>
                <input type="submit" name="Login">
        </form>
</body>
</html>





