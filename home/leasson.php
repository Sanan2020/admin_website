<!DOCTYPE html>
<html lang="en">
<head>
<style>
div.gallery {
  /* margin: 5px; */
  border: 1px solid #ccc;
  /* float: left; */
  /* width: 180px; */
  /* background-color:  #ccc; */
  padding-bottom: 5%;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 200px;
  height: 200px;
  
  /* float: right; */
  display: block;
  margin-left: auto;
  margin-right: auto;
  /* width: 50%; */
}

div.desc {
  padding: 15px;
  text-align: center;
} 

* {
  box-sizing: border-box;
}

.responsive {
  padding: 6px 6px;
  float: left;
  width: 17.99999%;
  /* height: auto; */
/* 12 */
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
    
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 60%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

.img{
  display: flex;
  justify-content: center;
  align-items: center;
}
    
/* เพิ่มสไตล์เพื่อปรับแต่งลักษณะของเส้นคั่น */
    hr {
      /* border: 2px solid #ccc; */
      border: 2px solid #3498DB;
      margin: 0px 20px; /* ระยะห่างด้านบนและด้านล่างของเส้น */
    }
    p {
      margin-left: 60px; /* ระยะห่างด้านบนของย่อหน้า */
    }
    h2 {
      margin-left: 60px; /* ระยะห่างด้านบนของย่อหน้า */
    }

    .dropdown {
    display: flex;
    flex-direction: column;
    align-items: center; 
    /* justify-content: center;  */
    position: relative;
}
.dropdown-content {
    top: 100%;
    position: absolute;
}
</style>
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
<input class="button" type="button" value="เพิ่มบทเรียน" onclick="window.location.href='../option_leasson/leasson_insert_frm.php';" style="float: right; margin-right: 3%;"><br><br><br>
 <!-- กลุ่มที่ 1 -->
 <h2>ระดับง่าย</h2>
<!-- <p>เนื้อหากลุ่มที่ 1</p> -->
<hr>
<center><table><td>
<?php
    $sql = "SELECT * FROM tb_lesson WHERE description ='easy'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
 
      <div class="responsive">
      <div class="gallery">
      <img src='http://localhost/new_image/<?php echo $row["pic"]; ?>' alt='Cinque Terre' >
      <!-- <img src='https://c4be-27-55-70-11.ngrok-free.app/new_image/<?php echo $row["pic"]; ?>' alt='Cinque Terre' > -->
      </a>
      <div style="text-align: left;" class='desc'>ชื่อคอร์ด : <?php echo $row["chords"]; ?><br>ระดับ : <?php echo $row["description"]; ?><br>ย่านความถี่ : <?php echo $row["freq_start"]; ?>-<?php echo $row["freq_end"]; ?></div>
      <!-- <input type='button' value='แก้ไข' onclick="window.location.href='practice_insert_frm.php';"> -->
      <div class="dropdown">
        <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class="dropbtn">จัดการบทเรียน</button>
        <div id='dropdown<?php echo $row["id"]; ?>' class="dropdown-content">
          <a href='../option_leasson/lesson_edit_frm.php?data=<?php echo $row["id"]; ?>'>แก้ไขบทเรียน</a>
          <a href='../option_leasson/leasson_delete.php?data=<?php echo $row["id"]; ?>'>ลบบทเรียน</a>
        </div>
      </div>

    </div>
    </div>
      <?php
        }
    } else {
      echo "<center>0 results</center>";
    }
    // mysqli_close($conn);
?>
</td>
 </table></center>

<!-- กลุ่มที่ 2 -->
<h2>ระดับกลาง</h2>
<hr>
 <center><table><td>
<?php
    $sql = "SELECT * FROM tb_lesson WHERE description ='middle'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
 
      <div class="responsive">
      <div class="gallery">
      <img src='http://localhost/new_image/<?php echo $row["pic"]; ?>' alt='Cinque Terre' >
      <!-- <img src='https://c4be-27-55-70-11.ngrok-free.app/new_image/<?php echo $row["pic"]; ?>' alt='Cinque Terre' > -->
    </a>
      <div style="text-align: left;" class='desc'>ชื่อคอร์ด : <?php echo $row["chords"]; ?><br>ระดับ : <?php echo $row["description"]; ?><br>ย่านความถี่ : <?php echo $row["freq_start"]; ?>-<?php echo $row["freq_end"]; ?></div>
      <!-- <input type='button' value='แก้ไข' onclick="window.location.href='practice_insert_frm.php';"> -->
      <div class="dropdown" style="text-align: center;">
        <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class="dropbtn">จัดการบทเรียน</button>
        <div id='dropdown<?php echo $row["id"]; ?>' class="dropdown-content">
          <a href='../option_leasson/lesson_edit_frm.php?data=<?php echo $row["id"]; ?>'>แก้ไขบทเรียน</a>
          <a href='../option_leasson/leasson_delete.php?data=<?php echo $row["id"]; ?>'>ลบบทเรียน</a>
        </div>
      </div>

    </div>
    </div>
      <?php
        }
    } else {
      echo "<center>0 results</center>";
    }
    // mysqli_close($conn);
?>
</td>
 </table></center>

<!-- กลุ่มที่ 3 -->
<h2>ระดับยาก</h2>
<hr>
 <center><table><td>
<?php
    $sql = "SELECT * FROM tb_lesson WHERE description ='hard'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { ?>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
 
      <div class="responsive">
      <div class="gallery">
      <img src='http://localhost/new_image/<?php echo $row["pic"]; ?>' alt='Cinque Terre' >
      <!-- <img src='https://c4be-27-55-70-11.ngrok-free.app/new_image/<?php echo $row["pic"]; ?>' alt='Cinque Terre' > -->
      </a>
      <div style="text-align: left;" class='desc'>ชื่อคอร์ด : <?php echo $row["chords"]; ?><br>ระดับ : <?php echo $row["description"]; ?><br>ย่านความถี่ : <?php echo $row["freq_start"]; ?>-<?php echo $row["freq_end"]; ?></div>
      <!-- <input type='button' value='แก้ไข' onclick="window.location.href='practice_insert_frm.php';"> -->
      <div class="dropdown" style="text-align: center;">
        <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class="dropbtn">จัดการบทเรียน</button>
        <div id='dropdown<?php echo $row["id"]; ?>' class="dropdown-content">
          <a href='../option_leasson/lesson_edit_frm.php?data=<?php echo $row["id"]; ?>'>แก้ไขบทเรียน</a>
          <a href='../option_leasson/leasson_delete.php?data=<?php echo $row["id"]; ?>'>ลบบทเรียน</a>
        </div>
      </div>

    </div>
    </div>
      <?php
        }
    } else {
      echo "<center>0 results</center>";
    }
    // mysqli_close($conn);
?>
</td>
 </table></center>
</body>
</html>