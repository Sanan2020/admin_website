<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- JavaScript code -->
<script>
  function showSweetAlert() {
    Swal.fire({
      title: 'สร้างรหัสผ่านใหม่เรียบร้อยแล้ว',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
      //goto page login
      window.location='../index.php';
    }, 2000);

  }
//  showSweetAlert();
function showSweetAlert2() {
    Swal.fire({
      title: 'กรุณากรอกรหัสผ่านให้ตรงกัน',
      text: 'This is a SweetAlert dialog.',
      icon: 'error',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
    }, 2000);
  }
</script>
<body>
<?php
//  if(isset($_REQUEST['email'])) {}
$mail = $_REQUEST['mail'];
//echo $mail;
//select
?>
<style>
    body {
      font-family: sans-serif;
    }

    form {
      width: 300px;
      /* margin: 0 auto; */
        padding: 40px;  

      background-color:cornflowerblue;
      position: absolute;
      left: 37%;
      top: 20%;
    }

    input {
      width: 92%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 3px;
    }

    .login-link {
      text-align: center;
      margin-top: 10px;
    }

    a {
      color: #000;
}
</style>
<form action="" method="post">
    <h3>Create new password</h3>
    Password: <input type="password" placeholder="Password" id="password" name="pass" required>
    Confirm Password: <input type="password" placeholder="Confirm Password" name="con_pass" required>
    <button type="submit">Save password</button>
  </form>

<!-- 
  เช็คให้ตรงกัน
  ทำการแก้ไขรหัส
-->
<?php
  if(isset($_REQUEST['pass'])) {
    $pass = $_REQUEST['pass'];
    $con_pass = $_REQUEST['con_pass'];
    if($pass == $con_pass){
    //echo $pass;
    //echo $con_pass;

    //ทำการแก้ไข pass โดยใช้ mail ค้นหา
    require '../connect.php';
    $pass = $_REQUEST['pass'];
    $pass_en = base64_encode($pass);
    $sql = "UPDATE tb_accounts SET password='$pass_en' WHERE email='$mail'";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>",
        "showSweetAlert();",
        "</script>";

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    }else{
      //echo "not match";
      echo "<script type='text/javascript'>",
            "showSweetAlert2();",
            "</script>";
    }
  }
?>
</body>
</html>