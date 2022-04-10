<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    session_start();
    if(!isset($_SESSION['isLoginOK'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Hahalolo/admin/css/css1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<body class="text-start">
 <?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    //session_start();
   // if(!isset($_SESSION['isLoginOK'])){
    //    header("location:login.php");
    //}
    //include("template/header.php");

       // Bước 01: Kết nối Database Server
       $maphong = $_GET['maphong'];
       $conn = mysqli_connect('localhost','root','','db_hahalolo');
       if(!$conn){
           die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
       }
       // Bước 02: Thực hiện truy vấn
       $sql = "SELECT * FROM phong WHERE maphong = '$maphong'";
       $result = mysqli_query($conn,$sql);
       if(mysqli_num_rows($result) > 0){
           $row = mysqli_fetch_assoc($result);
       }
       mysqli_close($conn);
?>
    <main>
    <div class="container">
        <h5 class="text-center text-primary mt-5">Chỉnh sửa chi tiết phòng</h5>
        <!-- Form thêm Dữ liệu nhân viên -->
        <form action="add-room-process.php" method="post">
        <div class="form-group">
        <div class="form-group">
                <label for="txtMaks">Mã khách sạn</label>
                <input type="text" class="form-control" name="makhachsan" placeholder="Nhập Ma Khachsan" readonly value="<?php echo $row['makhachsan'];?>">
            </div>
            <div class="form-group">
                <label for="txtMap">Mã phòng</label>
                <input type="text" class="form-control" name="maphong" placeholder="Nhập Mã phòng" value="<?php echo $row['maphong'];?>">
            </div>
            
            <div class="form-group">
                <label for="txtTenp">Tên phòng</label>
                <input type="text" class="form-control" name="tenphong" placeholder="Nhập Tên phòng" value="<?php echo $row['tenphong'];?>">
               
            </div>
            <div class="form-group">
                <label for="txtSonguoi">Số người</label>
                <input type="int" class="form-control" name="songuoi" placeholder="Số người" value="<?php echo $row['songuoi'];?>">
                
            </div>
            <div class="form-group">
                <label for="txtGia">Giá</label>
                <input type="int" class="form-control" name="gia" placeholder="Nhập Giá" value="<?php echo $row['gia'];?>">
               
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Lưu lại</button>
        </form>
    </div>    
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
</html>



