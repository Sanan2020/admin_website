<?php
    $is = $_REQUEST['is'];
    echo "<script>var name = '$is';</script>";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'แก้ไขบัญชีสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    setTimeout(() => {
      Swal.close();
      if(name==1){
        window.location='../home/admin.php';
      }else{
        window.location='../home/user.php';
      }
    }, 2000);
  }
</script>
<?php
    require '../connect.php';
    //$is = $_REQUEST['is'];
    $id = $_REQUEST['id'];
    $email = $_REQUEST['email'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $sql = "UPDATE tb_accounts SET email='$email' ,fname='$fname' ,lname='$lname' WHERE id=$id";
 
    if (mysqli_query($conn, $sql)) {
      //echo "Record deleted successfully";
      echo "<script type='text/javascript'>",
       "showSweetAlert2();",
       "</script>";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    // mysqli_close($conn);
?>