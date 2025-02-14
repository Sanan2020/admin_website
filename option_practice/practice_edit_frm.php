<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require '../navbar.html';
    require '../connect.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<?php
    $id = $_REQUEST['data'];
    $sql = "SELECT * FROM tb_practice WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //echo $row['email'];
        $song = $row['song'];
        $chords = $row['chords'];
        $freq_s = $row["freq_start"];
        $freq_e = $row["freq_end"];
    }
    mysqli_close($conn);
?>
    <center>
    
        <form action="../option_practice/practice_edit_save.php">
       <input hidden name="id" type="text" value="<?php echo $id ?>">
        ชื่อเพลง: <input name="song" type="text" value="<?php echo $song ?>">
       คอร์ด: <input name="chords" type="text" value="<?php echo $chords ?>"> 
        ประเภท: <input name="freq_s" type="text" value="<?php echo $freq_s ?>">
       -: <input name="freq_e" type="text" value="<?php echo $freq_e ?>">
        <input style="padding: 6px 14px; background-color: #04AA6D; border: none; color: white;" type="submit" value="Save Changes"></td></tr>
        </form>
   
</center>
</body>
</html>