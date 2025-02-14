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
    $is = $_REQUEST['is'];
    
    $id = $_REQUEST['data'];
    $sql = "SELECT * FROM tb_accounts WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //echo $row['email'];
        $email = $row['email'];
        $fname = $row['fname'];
        $lname = $row['lname'];
    }
    mysqli_close($conn);
?>
    <center>
  
        <form action="edit_save.php">
        <input hidden name="is" type="text" value="<?php echo $is ?>">
        <input hidden name="id" type="text" value="<?php echo $id ?>">
        Email: <input name="email" type="email" value="<?php echo $email ?>" required>
       First name: <input name="fname" type="text" value="<?php echo $fname ?>" required> 
        Last name: <input name="lname" type="text" value="<?php echo $lname ?>" required>
        <input style="padding: 6px 14px; background-color: #04AA6D; border: none; color: white;" type="submit" value="Save Changes"></td></tr>
        </form>

</center>
</body>
</html>