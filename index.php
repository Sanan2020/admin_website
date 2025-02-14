<?php
  session_start();
  require 'connect.php';
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

    .login-link {
      text-align: center;
      margin-top: 10px;
    }

    a {
      color: #000;
}
</style>
<form action="" method="post">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

<!-- <a style="right: 0; position: absolute;" href="signup.html">Forgot your password?</a> -->
<a href="../new/PHPMailer/fmail.php">Forgot your password?</a><br><br>

    <button type="submit" >Login</button>

    <div class="login-link">
    <span>Don't have an account?</span>
    <a href="signup.html">Sign up</a>
  </div>
  </form>
  
<!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert() {
    Swal.fire({
      title: 'ออกจากระบบสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
    }, 2000);
  }
//  showSweetAlert();
function showSweetAlert2() {
    Swal.fire({
      title: 'เข้าสู่ระบบไม่สำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'error',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
    }, 1000);
  }
</script>

<?php
        // session_start();
        // session_destroy();
    //    $_SESSION['user'] = "sanan";
        // $_SESSION['role'] = "Admin";
  // echo $_REQUEST['email'];
if(isset($_POST['email']) && isset($_POST['password']) ){
    // require 'connect.php';
    $d_pass = base64_encode($_POST['password']);
    $sql = "SELECT * FROM tb_accounts WHERE email='".$_POST['email']."' AND password='".$d_pass."' AND isAdmin ='1'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // echo "1";
         echo '<script>location.href = "home/admin.php";</script>';
         // echo '<script>location.href = "";</script>';
    }else{
        // echo '<script>alert("เข้าสู่ระบบไม่สำเร็จ!!!");</script>';
        echo "<script type='text/javascript'>",
            "showSweetAlert2();",
            "</script>";
        // echo '<script>location.href = "index.php";</script>';
    }
}
?>

<?php
        // session_start();
        if(isset($_SESSION['user'])) {
          // echo "Logged in as " . $_SESSION['user'];
          echo "<script type='text/javascript'>",
            "showSweetAlert();",
            "</script>";
             session_destroy();
        } else {
          // echo "Not logged in.";       
        }
?>