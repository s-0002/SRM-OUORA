<?php
   session_start();

   if(array_key_exists("signout", $_GET)){
    
    unset($_SESSION);
    setcookie("id"," ", time()- 60*60*24);
    
    $_COOKIE['id'] = "";
    
    session_destroy();
    header("Location: index.html");
    
}else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])){
    
    header("Location: redirect.php");
}


?>