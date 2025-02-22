<?php
    // $email = $_REQUEST['email'];
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
<meta charset="UTF-8">
<form action="" method="post">
    <h3>Reset password</h3>
    <input type="email" name="email" placeholder="Your Email" required>

    <button type="submit">Reset password</button><br>
    <div class="login-link">
    <a href="../index.php">Return to login</a>
  </div>
  </form>

<script>
  function showSweetAlert() {
    Swal.fire({
  title: 'กำลังส่งรหัสไปยังอีเมล...',
  text: 'กรุณารอสักครู่',
  icon: 'info',
  showCancelButton: false,
  showConfirmButton: false,
  allowOutsideClick: false,
  showLoaderOnConfirm: true,
  timer: 2000 // ตัวอย่าง: ให้โหลดเป็นเวลา 2 วินาที (ตัวเลือก timer เป็น milliseconds)
}).then((result) => {
  // ตรวจสอบผลลัพธ์หลังจากโหลดเสร็จ
  if (result.dismiss === Swal.DismissReason.timer) {
    // โหลดเสร็จแล้ว
    Swal.fire({
      title: 'เสร็จสิ้น!',
      icon: 'success',
      showConfirmButton: true
    });
    window.location='mail.php?email=<?php echo $_REQUEST['email'] ?>';
  }
});
  }

function showSweetAlert2() {
    Swal.fire({
      title: 'ไม่พบอีเมล',
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

  <?php
    require '../connect.php';
  if(isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
    $sql = "SELECT * FROM tb_accounts WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "<script type='text/javascript'>",
      "showSweetAlert();",
      "</script>";
    }else{
      echo "<script type='text/javascript'>",
      "showSweetAlert2();",
      "</script>";
    }
    mysqli_close($conn);
  }
?>
