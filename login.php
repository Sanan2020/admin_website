<?php
    // session_start();
    // session_destroy();
    // $_SESSION['user'] = "sanan";
    // $_SESSION['role'] = "Admin";
    // echo $_REQUEST['email'];
if(isset($_POST['email']) && isset($_POST['password']) ){
    require 'connect.php';
    $d_pass = base64_encode($_POST['password']);
    $sql = "SELECT * FROM tb_accounts WHERE email='".$_POST['email']."' AND password='".$d_pass."' AND isAdmin ='1'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // echo "1";
        echo '<script>location.href = "home/admin.php";</script>';
    }else{
        echo '<script>alert("เข้าสู่ระบบไม่สำเร็จ!!!");</script>';
        echo '<script>location.href = "index.php";</script>';
    }
}
?>