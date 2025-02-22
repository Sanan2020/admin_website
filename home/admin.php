<!DOCTYPE html>
<html lang="en">
<head>
 
<?php
  // if(session_status() != 2){
  session_start();
  // echo session_status();
  // }
  require '../navbar.html';
  require '../connect.php';
?>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guitar</title>
</head>

<script>
  function toggleDropdown(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.id !== dropdownId && openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
    dropdown.classList.toggle("show");
  }
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>
<body>
<br><br><br>
<input class="button" type="button" value="เพิ่มผู้ดูแลระบบ" onclick="window.location.href='../option_account/insert_frm.php?is=1';" style="float: right; margin-right: 3%;"><br>
<?php
    $sql = "SELECT * FROM tb_accounts WHERE isAdmin ='1' ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { 
      $count = 0;
      ?>
      <center><table>
      <tr>
      <th>ID</th>
      <th>Email</th>
      <!-- <th>password</th> -->
      <th>Name</th>
      <th>LastName</th>
      <th>Action</th>
      </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { 
      $count++;
      ?>
        <tr><td><?php echo /*$row["id"];*/$count ?></td><td><?php echo $row["email"]; ?></td><td><?php echo $row["fname"]; ?></td><td><?php echo $row["lname"]; ?></td>
        <td class='td'>
          <div class='dropdown' style='float:left;'>
          <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class='dropbtn'>จัดการผู้ดูแลระบบ</button>
          <div id='dropdown<?php echo $row["id"]; ?>' class='dropdown-content'>
          <a href='../option_account/edit_frm.php?data=<?php echo $row["id"]; ?>&is=1'>แก้ไขข้อมูล</a>
          <a href='../option_account/editPass_frm.php?data=<?php echo $row["id"]; ?>&is=1'>แก้ไขรหัสผ่าน</a>
          <a href='../option_account/account_delete.php?data=<?php echo $row["id"]; ?>&is=1'>ลบบัญชี</a>
        </div></div>
    </td></tr>
    <?php
      }
      echo"</table></center>";
    } else {
      echo "<center>0 results</center>";
    } 
    // mysqli_close($conn);
?>
</body>
</html>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  function showSweetAlert() {
    Swal.fire({
      title: 'เข้าสู่ระบบสำเร็จ',
      text: '',
      icon: 'success',
      showConfirmButton: false,
    });
    setTimeout(() => {
      Swal.close();
    }, 2000);
  }
</script>

<?php
// session_start();
 if(isset($_SESSION['admin'])) {
  //  echo "Logged in as " . $_SESSION['user'];
 } else {
  //  echo "Not logged in.";
   $_SESSION['admin'] = "active";
   echo "<script type='text/javascript'>","showSweetAlert();","</script>";
 }