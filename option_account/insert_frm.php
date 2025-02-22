<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require '../connect.php';
    require '../navbar.html';

    $is = $_REQUEST['is'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guitar</title>
</head>
<style>
form {
      width: 300px;
      /* margin: 0 auto; */
        padding: 40px;  

      background-color:#ccc;
      position: absolute;
      left: 37%;
      top: 20%;
      text-align: left;
    }
    input {
      width: 100%;
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
</style>
<body>
<br><br><br>
    <center>
        <form name="myForm" action="" onsubmit="" method="post">
        <input hidden name="is" type="text" value="<?php echo $is ?>">
        Email: <input name="email" type="email" value="" required>
        Password: <input name="pass" type="password" value="" required>
        First name: <input name="fname" type="text" value="" required> 
        Last name: <input name="lname" type="text" value="" required>
        <input style="padding: 6px 14px; background-color: #04AA6D; border: none; color: white;" type="submit" value="Insert" onclick=""></td></tr>
        </form>
    </center>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert() {
    Swal.fire({
      title: 'มีอีเมลนี้อยู่แล้ว',
      text: 'This is a SweetAlert dialog.',
      icon: 'error',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    setTimeout(() => {
      Swal.close();
    }, 2000);
  }

  function showSweetAlert2() {
    Swal.fire({
      title: 'เพิ่มบัญชีสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    setTimeout(() => {
      Swal.close();
      let elements = document.getElementsByName("is");
      //alert(elements[0].value);
      if(elements[0].value==1){
        window.location='../home/admin.php';
      }else{
        window.location='../home/user.php';
      }
    }, 2000);
  }
</script>
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "_guitar";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
    if(isset($_REQUEST['email'])) {
    $inputData = $_REQUEST['email'];
    $sql = "SELECT * FROM tb_accounts WHERE email='$inputData'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // echo $inputData;
        echo "<script type='text/javascript'>",
            "showSweetAlert();",
            "</script>";
    }else{
       // echo "no data";
    $is = $_REQUEST['is'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $pass_en = base64_encode($pass);
    $sql = "INSERT INTO tb_accounts (email,password,fname,lname,isAdmin) VALUES ('$email','$pass_en','$fname','$lname','$is')";
 
    if (mysqli_query($conn, $sql)) {
      //echo "Record deleted successfully";
       echo "<script type='text/javascript'>",
       "showSweetAlert2();",
       "</script>";  
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    } 
  }
    // mysqli_close($conn);
    }
?>
</body>
</html>