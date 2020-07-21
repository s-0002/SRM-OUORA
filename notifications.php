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
                   <a href="" id="current" class="nav-link"><i class="fas fa-bell fa-lg"></i> NOTIFICATIONS</a>
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
                
  <img src="construction.gif" class="w-50 text-center" alt="" style="margin-left:auto;margin-right:auto;display:block;">
                           

    
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