<!DOCTYPE html>
<html lang="en">
<head>
<?php
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
<input class="button" type="button" value="เพิ่มสมาชิก" onclick="window.location.href='../option_account/insert_frm.php?is=0';" style="float: right; margin-right: 3%;"><br>
<?php
    // $sql = "SELECT * FROM tb_accounts WHERE isAdmin !='1'";
    // $sql = "SELECT *
    // FROM users INNER JOIN score ON users.id = score.id WHERE isAdmin !='1';";
    
   // $sql = "SELECT * FROM tb_accounts LEFT JOIN tb_lesson_score ON tb_accounts.id = tb_lesson_score.user_id WHERE isAdmin !='1'";

// $sql = "SELECT acc.id ,acc.email ,acc.password ,acc.fname ,acc.lname ,tb_lesson_score.lesson_score ,tb_practice_score.practice_score 
// FROM tb_accounts acc
// LEFT JOIN tb_lesson_score ON acc.id = tb_lesson_score.user_id 
// LEFT JOIN tb_practice_score ON acc.id = tb_practice_score.user_id 
// WHERE isAdmin !='1'  ORDER BY acc.id ASC";

$sql = "SELECT acc.id ,acc.email ,acc.password ,acc.fname ,acc.lname ,gg.lesson_score ,mm.practice_score FROM tb_accounts acc 
LEFT JOIN ( SELECT user_id,SUM(lesson_score) AS lesson_score FROM tb_lesson_score GROUP BY tb_lesson_score.user_id ) gg ON acc.id = gg.user_id 
LEFT JOIN ( SELECT user_id,SUM(practice_score) AS practice_score FROM tb_practice_score GROUP BY tb_practice_score.user_id ) mm ON acc.id = mm.user_id 
WHERE isAdmin !='1' ORDER BY acc.id ASC";
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
      <th>Lesson score</th>
      <th>Practice score</th>
      <th>Action</th>
      </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { 
      $count++;
      if($row["lesson_score"] !=""){$lesson_score = $row["lesson_score"];
      }else{$lesson_score = 'N/A';}

      if($row["practice_score"] !=""){$practice_score = $row["practice_score"];
      }else{$practice_score = 'N/A';}
      ?>
        <tr><td><?php echo /*$row["id"];*/ $count ?></td><td><?php echo $row["email"]; ?></td><td><?php echo $row["fname"]; ?></td><td><?php echo $row["lname"]; ?></td>
        <td><?php echo $lesson_score; ?></td><td><?php echo $practice_score; ?></td>
        <td class='td'>
          <div class='dropdown' style='float:left;'>
          <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class='dropbtn'>จัดการสมาชิก</button>
          <div id='dropdown<?php echo $row["id"]; ?>' class='dropdown-content'>
          <a href='../option_account/edit_frm.php?data=<?php echo $row["id"]; ?>&is=0'>แก้ไขข้อมูล</a>
          <a href='../option_account/editPass_frm.php?data=<?php echo $row["id"]; ?>&is=0'>แก้ไขรหัสผ่าน</a>
          <a href='../option_account/account_delete.php?data=<?php echo $row["id"]; ?>&is=0'>ลบบัญชี</a>
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