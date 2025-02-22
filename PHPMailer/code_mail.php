<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$mail = $_REQUEST['mail'];
$ran = $_REQUEST['ran'];
//echo $ran;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function showSweetAlert2() {
    Swal.fire({
      title: 'รหัสไม่ถูกต้อง',
      text: 'This is a SweetAlert dialog.',
      icon: 'error',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    setTimeout(() => {
      Swal.close();
    }, 1000);
  }
</script>

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
    <h3>Verification code</h3>
    <input type="text" name="password" placeholder="Your code" required>
    <!-- Password: <input type="password" placeholder="Password" id="password" name="pass" required> -->
    <button type="submit">Reset</button>
</form>
<?php
    if(isset($_REQUEST['password'])) {
    $pass = $_REQUEST['password'];
      if($pass == $ran){
        // echo "pass match";
      // echo "<script>window.location='new_pass.php';</script>";   
        header('Location: new_pass.php?mail='.$mail.'');
      }else{
        // echo "pass not match";
        echo "<script type='text/javascript'>",
            "showSweetAlert2();",
            "</script>";
      }
    }
?>
</body>
</html>