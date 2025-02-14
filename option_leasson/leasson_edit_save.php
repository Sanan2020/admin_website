<!-- Include SweetAlert CSS -->
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JavaScript code -->
<script>
  function showSweetAlert2() {
    Swal.fire({
      title: 'แก้ไขบทเรียนสำเร็จ',
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
//001
//if($_FILES['fileToUpload'] != null){
$uploadedFile = $_FILES['fileToUpload']; // รับข้อมูลไฟล์ที่อัปโหลดจากฟอร์ม
$targetDirectory = "C:/xampp/htdocs/new_image/"; // โฟลเดอร์ที่ต้องการบันทึกไฟล์
$targetFile = $targetDirectory . basename($uploadedFile['name']); // ตำแหน่งที่เก็บไฟล์
//echo "<script>alert('$targetFile');</script>";
// ตรวจสอบว่าไฟล์ถูกอัปโหลดสมบูรณ์และไม่มีข้อผิดพลาด
if (move_uploaded_file($uploadedFile['tmp_name'], $targetFile)) {
    //echo "ไฟล์ ". basename($uploadedFile['name']). " ถูกอัปโหลดเรียบร้อยแล้ว.";
    $pic =  $uploadedFile['name']; //001
} else {
    //echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
    $pic = $_REQUEST['oldpic']; //002
}  
//}
  $id = $_REQUEST['id'];
  
  $chords = $_REQUEST['chords'];
  $des = $_REQUEST['des'];
 // $pic =  $uploadedFile['name']; //001
 //  $pic = $_REQUEST['oldpic']; //002
  $freq_s = $_REQUEST['freq_s'];
  $freq_e = $_REQUEST['freq_e'];

  $sql = "UPDATE tb_lesson SET chords='$chords' ,pic='$pic' ,description='$des' ,freq_start='$freq_s' ,freq_end='$freq_e' WHERE id=$id";
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