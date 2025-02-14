<?php
    require '../connect.php';
    $is = $_REQUEST['is'];

    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $pass_en = base64_encode($pass);
    $sql = "INSERT INTO tb_accounts (email,password,fname,lname,isAdmin) VALUES ('$email','$pass_en','$fname','$lname','$is')";
 
    if (mysqli_query($conn, $sql)) {
      //echo "Record deleted successfully";
      if($is==1){
        require('../home/admin.php');
        
      }else{
        require('../home/user.php');}
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    
    // mysqli_close($conn);

?>