<?php
$uploadedFile = $_FILES['file']; // รับข้อมูลไฟล์ที่อัปโหลดจากฟอร์ม

$targetDirectory = "uploads/"; // โฟลเดอร์ที่ต้องการบันทึกไฟล์
$targetFile = $targetDirectory . basename($uploadedFile['name']); // ตำแหน่งที่เก็บไฟล์

// ตรวจสอบว่าไฟล์ถูกอัปโหลดสมบูรณ์และไม่มีข้อผิดพลาด
if (move_uploaded_file($uploadedFile['tmp_name'], $targetFile)) {
    echo "ไฟล์ ". basename($uploadedFile['name']). " ถูกอัปโหลดเรียบร้อยแล้ว.";
} else {
    echo "เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
}
?>
