<!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'เพิ่มบทเรียนสำเร็จ',
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

$uploadedFile = $_FILES['fileToUpload']; // รับข้อมูลไฟล์ที่อัปโหลดจากฟอร์ม
$targetDirectory = "C:/xampp/htdocs/new_image/"; // โฟลเดอร์ที่ต้องการบันทึกไฟล์
$targetFile = $targetDirectory . basename($uploadedFile['name']); // ตำแหน่งที่เก็บไฟล์
//echo "<script>alert('$targetFile');</script>";
// ตรวจสอบว่าไฟล์ถูกอัปโหลดสมบูรณ์และไม่มีข้อผิดพลาด
if (move_uploaded_file($uploadedFile['tmp_name'], $targetFile)) {
    //echo "ไฟล์ ". basename($uploadedFile['name']). " ถูกอัปโหลดเรียบร้อยแล้ว.";
} else {
    echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
}  

  $chords = $_REQUEST['chords'];
  $des = $_REQUEST['des'];
  // $pic = $_REQUEST['fileToUpload'];
  $pic = $uploadedFile['name'];
  $freq_s = $_REQUEST['freq_s'];
  $freq_e = $_REQUEST['freq_e'];
  //$sql = "INSERT INTO users (chords,description,freq_start,freq_end) VALUES ('$chords','$des','$freq_s','$freq_e')";
  $sql = "INSERT INTO tb_lesson (chords,pic,description,freq_start,freq_end) VALUES ('$chords','$pic','$des','$freq_s','$freq_e')";
  if (mysqli_query($conn, $sql)) {
    //echo "Record deleted successfully";
    echo "<script type='text/javascript'>",
      "showSweetAlert2();",
      "</script>";
      //require('../home/leasson.php');
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
?>