<!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'ลบบทเรียนสำเร็จ',
      text: 'This is a SweetAlert dialog.',
      icon: 'success',
      // confirmButtonText: 'OK'
      showConfirmButton: false, // Hide the OK button
    });

    // Set a timeout to close SweetAlert after 3 seconds
    setTimeout(() => {
      Swal.close();
      window.location='../home/leasson.php';
    }, 2000);
  }
</script>
<?php
    require '../connect.php';
    $id = $_REQUEST['data'];
    // $sql = "DELETE FROM tb_lesson WHERE id=$id";
    $sql = "DELETE tb_lesson,tb_lesson_score FROM tb_lesson
    LEFT JOIN tb_lesson_score ON tb_lesson_score.lesson_id = tb_lesson.id
    WHERE tb_lesson.id =$id";
    if (mysqli_query($conn, $sql)) {
      //echo "Record deleted successfully";
      echo "<script type='text/javascript'>",
      "showSweetAlert2();",
      "</script>";
       //require('../home/leasson.php');
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    
    // mysqli_close($conn);
?>