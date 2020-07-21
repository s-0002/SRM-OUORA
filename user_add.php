<?php include "module.php";

$connection = connect_to_db("test");



if(isset($_POST['submit'])){
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "INSERT INTO login (user, pass) VALUES ('$user', '$pass')";
            try{
        mysqli_query($connection, $query);
        }catch(exception $e){
            echo $e->get_message();
        }
}

?>


<form method="post" action="">
   Username <input type="text" name="user"><br>
    Password<input type="password" name="pass"><br>
    <input type="submit" name="submit">
</form>