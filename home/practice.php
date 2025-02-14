<!DOCTYPE html>
<html lang="en">
<head>
<style>

 .desc {
  /* padding: 15px;
  text-align: center; */
  word-wrap: break-word; /* หรือ overflow-wrap: break-word; */
 }
    /* ----------------------------------------------------------------------------------- */
  div.gallery {
  /* margin: 5px; */
  border: 1px solid #ccc;
  /* float: left; */
  /* width: 180px; */
  /* background-color:  #ccc; */


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
  width: 36.99999%;
   /* height: 200%;  */
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
    <input class="button" type="button" value="เพิ่มแบบฝึกหัด" onclick="window.location.href='../option_practice/practice_insert_frm.php';" style="float: right; margin-right: 3%;"><br><br><br>
 <!-- กลุ่มที่ 1 -->
 <h2>Jazz</h2>
<!-- <p>เนื้อหากลุ่มที่ 1</p> -->
<hr>
<center><table><td>
<?php
    $sql = "SELECT * FROM tb_practice WHERE freq_start ='jazz'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { ?>
    <!-- <div class="card-container"> -->
    <?php while($row = mysqli_fetch_assoc($result)) { ?>

      <div class="responsive">
      <div class="gallery">

      <div style="text-align: left;" class='desc'>ชื่อเพลง : <?php echo $row["song"]; ?><br>คอร์ด:<?php echo $row["chords"]; ?><br>
      ประเภท : <?php echo $row["freq_start"]; ?> <!--- <?php echo $row["freq_end"]; ?>--></div>

     <div class="dropdown">
        <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class="dropbtn">จัดการแบบฝึกหัด</button>
        <div id='dropdown<?php echo $row["id"]; ?>' class="dropdown-content">
          <a href='../option_practice/practice_edit_frm.php?data=<?php echo $row["id"]; ?>'>แก้ไขแบบฝึกหัด</a>
          <a href='../option_practice/practice_delete.php?data=<?php echo $row["id"]; ?>'>ลบแบบฝึกหัด</a>
        </div>
      </div>

    </div>
  </div>
      <!-- </div> -->
    <?php
      }
    } else {
      echo "<center>0 results</center>";
    }
    
   // mysqli_close($conn);
?>
</td>
 </table></center>
 <!-- กลุ่มที่ 1 -->
 <h2>POP</h2>
<!-- <p>เนื้อหากลุ่มที่ 1</p> -->
<hr>
<center><table><td>
<?php
    $sql = "SELECT * FROM tb_practice WHERE freq_start ='pop'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { ?>
    <!-- <div class="card-container"> -->
    <?php while($row = mysqli_fetch_assoc($result)) { ?>

      <div class="responsive">
      <div class="gallery">

      <div style="text-align: left;" class='desc'>ชื่อเพลง : <?php echo $row["song"]; ?><br>คอร์ด:<?php echo $row["chords"]; ?><br>
      ประเภท : <?php echo $row["freq_start"]; ?> <!--- <?php echo $row["freq_end"]; ?>--></div>

     <div class="dropdown">
        <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class="dropbtn">จัดการแบบฝึกหัด</button>
        <div id='dropdown<?php echo $row["id"]; ?>' class="dropdown-content">
          <a href='../option_practice/practice_edit_frm.php?data=<?php echo $row["id"]; ?>'>แก้ไขแบบฝึกหัด</a>
          <a href='../option_practice/practice_delete.php?data=<?php echo $row["id"]; ?>'>ลบแบบฝึกหัด</a>
        </div>
      </div>

    </div>
  </div>
      <!-- </div> -->
    <?php
      }
    } else {
      echo "<center>0 results</center>";
    }
    
   // mysqli_close($conn);
?>
</td>
 </table></center>


 <!-- กลุ่มที่ 1 -->
 <h2>Rock</h2>
<!-- <p>เนื้อหากลุ่มที่ 1</p> -->
<hr>
<center><table><td>
<?php
    $sql = "SELECT * FROM tb_practice WHERE freq_start ='rock'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { ?>
    <!-- <div class="card-container"> -->
    <?php while($row = mysqli_fetch_assoc($result)) { ?>

      <div class="responsive">
      <div class="gallery">

      <div style="text-align: left;" class='desc'>ชื่อเพลง : <?php echo $row["song"]; ?><br>คอร์ด : <?php echo $row["chords"]; ?><br>
      ประเภท : <?php echo $row["freq_start"]; ?> <!--- <?php echo $row["freq_end"]; ?>--></div>

     <div class="dropdown">
        <button onclick='toggleDropdown("dropdown<?php echo $row["id"]; ?>")' class="dropbtn">จัดการแบบฝึกหัด</button>
        <div id='dropdown<?php echo $row["id"]; ?>' class="dropdown-content">
          <a href='../option_practice/practice_edit_frm.php?data=<?php echo $row["id"]; ?>'>แก้ไขแบบฝึกหัด</a>
          <a href='../option_practice/practice_delete.php?data=<?php echo $row["id"]; ?>'>ลบแบบฝึกหัด</a>
        </div>
      </div>

    </div>
  </div>
      <!-- </div> -->
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