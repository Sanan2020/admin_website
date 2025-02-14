<?php
    $is = $_REQUEST['is'];
    echo "<script>var name = '$is';</script>";
?>

<!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>


  function showSweetAlert2() {
    Swal.fire({
      title: 'แก้ไขรหัสผ่านสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
     // let elements = document.getElementsByName("is");
      
      //alert(name);
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
    $is = $_REQUEST['is'];
    $id = $_REQUEST['id'];
    $pass = $_REQUEST['pass'];
    $pass_en = base64_encode($pass);
    $sql = "UPDATE tb_accounts SET password='$pass_en' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>",
        "showSweetAlert2();",
        "</script>";
        // if($is==1){
        //     require('../home/admin.php');
        //   }else{
        //     require('../home/user.php');}
        //echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    // mysqli_close($conn);
?>