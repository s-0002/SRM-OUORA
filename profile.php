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
        
     
        

    </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
                   <a id="#" href="que_asked.php" class="nav-link"><i class="far fa-question-circle fa-lg"></i> QUESTIONS ASKED BY ME</a>
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
                            <a class="dropdown-item my-1" href="#"><i class="fas fa-user mr-2"></i>My Profile</a>
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

<!-------------------------------------------------------------------------------------------------------------------->           
   
  <!-------------------------------------------------------------------------------------------------------------------->                 
                
  <div class="container my-3 p-5 w-50 border">
     <h4 class="text-center bg-secondary text-light p-1">MY PROFILE</h4><br>
     <div class="row justify-content-left myrow">
        <div class="col-md-3 mycol">
         <img style="width:120px" class="rounded-circle border" src="<?php echo getDP($userid, $connection);?>" alt="">
         </div>
         
         <div class="col-md-4 mycol align-self-center">
         <span class="font-weight-bold h4"><?php echo get_fullname($userid, $connection);?></span><br>
         <span class="small"><?php echo get_designation($userid, $connection);?></span>
         </div>
         
     </div>
     <hr>
     <div class="row">
        <div class="col-3">
            <span class="small font-italic">Total Questions Asked: <?php echo get_queAsked($userid, $connection);?></span>
        </div>
        <div class="col-4">
            <span class="small font-italic">Total Answers Posted: <?php echo get_ansPosted($userid, $connection);?></span>
        </div>
         
     </div>
     <hr>
    <div class="row justify-content-center">
       <div class="col-md-5">
          <label class="small font-weight-bold" for="first">FULL NAME</label>
           <span><?php echo get_fullname($userid, $connection);?></span> 
        </div> 
        <div class="col-md-5">
          <label class="small font-weight-bold" for="first">DATE OF BIRTH</label>
           <span><?php echo get_dob($userid, $connection);?></span> 
        </div> 
     </div>
     <div class="row justify-content-center">
       <div class="col-md-5">
           <label class="small font-weight-bold" for="first">USERNAME</label>
           <span><?php echo get_username($userid, $connection);?></span>
        </div>
        <div class="col-md-5">
           <label class="small font-weight-bold" for="first">EMAIL</label>
           <span><?php echo get_email($userid, $connection);?></span>
        </div>
        
         
     </div>
     
     <div class="row justify-content-center">
        <div class="col-md-5">
           <label class="small font-weight-bold" for="first">MOBILE</label>
           <span><?php echo get_mobile($userid, $connection);?></span>
        </div>
         <div class="col-md-5">
           <label class="small font-weight-bold" for="first">TITLE</label>
           <span><?php echo get_designation($userid, $connection);?></span>
        </div>
        
     </div>
     <div class="row justify-content-center">
       <div class="col-md-5">
           <label class="small font-weight-bold" for="first">CITY</label>
           <span><?php echo get_city($userid, $connection);?></span>
        </div>
        <div class="col-md-5">
           <label class="small font-weight-bold" for="first">STATE</label>
           <span><?php echo get_state($userid, $connection);?></span>
        </div>
        
         
     </div>
     

     <hr>
      <div class="row justify-content-right">
        <div class="col-md-5">
          <label class="small font-italic" for="first">Account Created On:</label>
           <span class="small"><?php echo get_accreatedon($userid, $connection);?></span> 
        </div>
        
         
     </div>
      
      
  </div>     
                           

    
</body>



    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>


<?php 



}else{ header("location: quora.html");}?>