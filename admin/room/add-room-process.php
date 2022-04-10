<?php
// Trước khi cho người dùng xâm nhập vào bên trong
// Phải kiểm tra THẺ LÀM VIỆC
session_start();
if(!isset($_SESSION['isLoginOK'])){
    header("location:login.php");
}

    // Xử lý giá trị GỬI TỚI
    if(isset($_POST['makhachsan'])){
        $makhachsan = $_POST['makhachsan'];
    }

    $maphong = $_POST['maphong'];
    $tenphong = $_POST['tenphong'];
    $songuoi = $_POST['songuoi'];
    $gia = $_POST['gia'];

    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','db_hahalolo');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // Bước 02: Thực hiện truy vấn
    $sql = "INSERT INTO phong (maphong, makhachsan, tenphong, songuoi, gia) VALUES ('$maphong','$makhachsan','$tenphong','$songuoi','$gia')";
    // echo $sql;
    $ketqua = mysqli_query($conn,$sql);
    
    if(!$ketqua){
        header("location: error.php"); //Chuyển hướng lỗi
    }else{
        header("location:room.php"); //Chuyển hướng lại Trang Quản trị
    }

    // Bước 03: Đóng kết nối
    mysqli_close($conn);

?>