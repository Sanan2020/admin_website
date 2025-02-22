<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'แก้ไขแบบฝึกหัดสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    setTimeout(() => {
      Swal.close();
      window.location='../home/practice.php';
    }, 2000);
  }
</script>
<?php
    require '../connect.php';
    $id = $_REQUEST['id'];
    $song = $_REQUEST['song'];
    $chords = $_REQUEST['chords'];
    $freq_s = $_REQUEST["freq_s"];
    $freq_e = $_REQUEST["freq_e"];
    $sql = "UPDATE tb_practice SET song='$song' ,chords='$chords' ,freq_start='$freq_s' ,freq_end='$freq_e' WHERE id=$id";
 
    if (mysqli_query($conn, $sql)) {
        //echo "Record deleted successfully";
        echo "<script type='text/javascript'>",
      "showSweetAlert2();",
      "</script>";
        //require('../home/practice.php');
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>