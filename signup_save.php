<!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'สร้างบัญชีสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
      window.location='index.php';
    }, 2000);
  }
</script>
<?php
    require 'connect.php';

    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $pass_en = base64_encode($pass);
    $sql = "INSERT INTO tb_accounts (email,password,fname,lname,isAdmin) VALUES ('$email','$pass_en','$fname','$lname','1')";
 
    // unset ($_REQUEST['email']);
    // session_unset();
    if (mysqli_query($conn, $sql)) {
      //echo "Record deleted successfully";
      echo "<script type='text/javascript'>",
      "showSweetAlert2();",
      "</script>";
        //require('index.html');
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    
    // mysqli_close($conn);

?>