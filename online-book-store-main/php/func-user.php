<?php 

# Get user
function get_user($con){
    $id = $_SESSION['user_id'];
   $sql  = "SELECT * FROM users WHERE id =?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $user = $stmt->fetch();
   }else {
      $user = 0;
   }

   return $user;
}
