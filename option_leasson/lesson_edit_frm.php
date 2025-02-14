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
    $sql = "SELECT * FROM tb_lesson WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //echo $row['email'];
        $pic = $row['pic'];
        $chords = $row['chords'];
        $freq_s = $row["freq_start"];
        $freq_e = $row["freq_end"];
        $description = $row["description"];
    }
    mysqli_close($conn);
?>

<center>
<form name="myForm" action="../option_leasson/leasson_edit_save.php" method="post" enctype="multipart/form-data">
<input hidden name="id" type="text" value="<?php echo $id ?>">
<label for="img">Select new image:</label>
<input type="file" id="fileToUpload" name="fileToUpload">
Image: <input name="oldpic" type="text" value="<?php echo $pic ?>" >
Chords: <input name="chords" type="text" value="<?php echo $chords ?>" required>
Description: <input name="des" type="text" value="<?php echo $description ?>" required>
Freq_start: <input name="freq_s" type="text" value="<?php echo $freq_s ?>" required> 
Freq_end: <input name="freq_e" type="text" value="<?php echo $freq_e ?>" required>
<input style="padding: 6px 14px; background-color: #04AA6D; border: none; color: white;" type="submit" name="fileToUploadsub" value="Save Changes" onclick="">
</form>
</center>

</body>
</html>