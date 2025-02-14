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
<?php 
  $is = $_REQUEST['is'];
  $id = $_REQUEST['data'];
?>
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
   
        <!-- <form action="editPass_save.php">
        <tr><td><input hidden name="id" type="text" value=""></td></tr>
        <tr><td>New Password: <input name="password" type="password" value=""></td></tr>
        <tr><td>Confirm Password: <input name="pass" type="password" value=""></td></tr>
        <tr><td><input type="submit" value="Edit"></td></tr>
        </form> -->

    <form action="editPass_save.php" class="pure-form">
   
        <!-- <legend>Confirm password with HTML5</legend> -->
        <input hidden name="is" type="text" value="<?php echo $is ?>">
        <input hidden name="id" type="text" value="<?php echo $id ?>">
        Password: <input type="password" placeholder="Password" id="password" name="pass" required>
        Confirm Password: <input type="password" placeholder="Confirm Password" id="confirm_password" required>

        <button style="padding: 6px 14px; background-color: #04AA6D; border: none; color: white;" type="submit" class="pure-button pure-button-primary">Save Changes</button>
   
</form>
  
</center>
<script>
    var password = document.getElementById("password"),confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>