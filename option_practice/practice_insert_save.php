<!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'เพิ่มแบบฝึกหัดสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
      window.location='../home/practice.php';
    }, 2000);
  }
</script>
<?php
    require '../connect.php';

    $song = $_REQUEST['song'];
    $chords = $_REQUEST['chords'];
    $freq_s = $_REQUEST['freq_s'];
    $freq_e = $_REQUEST['freq_e'];
    // $sql = "INSERT INTO users (song,chords,freq_start,freq_end) VALUES ('$song','$chords','$freq_s','$freq_e')";
    $sql = "INSERT INTO tb_practice (song,chords,freq_start,freq_end) VALUES ('$song','$chords','$freq_s','$freq_e')";
 
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