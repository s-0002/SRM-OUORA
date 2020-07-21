   
<?php

if(isset($_POST["answer"])){
    $ans = $_POST["qid"];
    echo $ans;
    
}


?>

  
   <!DOCTYPE html>

   <html lang="en">

   <head>

       <meta charset="UTF-8">

       <title>Document</title>
       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <script src="https://kit.fontawesome.com/fddb1adee8.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

   </head>

   <body>
  
        
        <?php 
       
               $i=0;
               while($i<9){


               echo '<div data-toggle="modal" data-target="#ans'.$i.'">
                                            <div class="btn">
                <h4 class="font-weight-bold text-muted text-sm">Be the first one to answer this question?</h4>
                                        </div>
                                    </div>';
                 
       
       ?>
         <!-- The Answer Modal -->
                <div class="modal" id="<?php echo 'ans'.$i?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                            <form action="" method="post">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Answer this Question..</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <?php echo $i; ?>
                      <div class="modal-body">
                       <input type="hidden" name="qid" value="<?php echo $i; ?>">
                        <textarea class="form-control" name="ans" placeholder="Answer this Question descriptively in less than 100 words." id="exampleFormControlTextarea1" rows="3" required></textarea>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer justify-content-center">
                        <button type="submit" name="answer" class="btn btn-outline-danger btn-sm">Answer</button>
                      </div>
                            </form>
                    </div>
                  </div>
                </div> 

    <?php  $i++;
   
               } ?>
       
       
      
      

   </body>

   </html>

   

  




