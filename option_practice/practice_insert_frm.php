<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require '../navbar.html';
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
        <form name="myForm" action="practice_insert_save.php">
        ชื่อเพลง: <input name="song" type="text" value="" required>
        คอร์ด: <input name="chords" type="text" value="" required>
        ประเภท: <input name="freq_s" type="text" value="" required>
        <!-- -: <input name="freq_e" type="text" value="" required> -->
        <input style="padding: 6px 14px; background-color: #04AA6D; border: none; color: white;" type="submit" value="Insert" onclick="">
        </form>
    </center>
</body>
</html>