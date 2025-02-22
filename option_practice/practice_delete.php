<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'ลบแบบฝึกหัดสำเร็จ',
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
    $id = $_REQUEST['data'];
    // $sql = "DELETE FROM tb_practice WHERE id=$id";
    $sql = "DELETE tb_practice,tb_practice_score FROM tb_practice
    LEFT JOIN tb_practice_score ON tb_practice_score.practice_id = tb_practice.id
    WHERE tb_practice.id =$id";
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