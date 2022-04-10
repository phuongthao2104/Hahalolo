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
    
  
    <main>
    <div class="container">
        <h5 class="text-center text-primary mt-5">Thêm mới khách sạn và phòng</h5>
        <!-- Form thêm Dữ liệu nhân viên -->
        <form action="add-room-process.php" method="post">
        <div class="form-group">
                <label for="exampleFormControlSelect2">Mã khách sạn</label>
                <select class="form-control" name="makhachsan">
                    <!-- Truy vấn dữ liệu để Hiển thị lựa chọn KS -->
                    <?php 
                        // Bước 01: Kết nối Database Server
                        $conn = mysqli_connect('localhost','root','','db_hahalolo');
                        if(!$conn){
                            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                        }
                        // Bước 02: Thực hiện truy vấn
                        $sql = "SELECT * FROM khachsan";

                        $result = mysqli_query($conn,$sql);

                        // Bước 03: Xử lý kết quả truy vấn
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <option value="<?php echo $row['makhachsan']; ?>"><?php echo $row['makhachsan']; ?></option>
                    <?php
                            }
                        }

                        // Bước 03: Đóng kết nối
                        mysqli_close($conn);
                    ?>
               
                </select>
            </div>
            <div class="form-group">
                <label for="txtMap">Mã phòng</label>
                <input type="text" class="form-control" name="maphong" placeholder="Nhập Mã phòng">
            </div>
            
            <div class="form-group">
                <label for="txtTenp">Tên phòng</label>
                <input type="text" class="form-control" name="tenphong" placeholder="Nhập Tên phòng">
               
            </div>
            <div class="form-group">
                <label for="txtSonguoi">Số người</label>
                <input type="int" class="form-control" name="songuoi" placeholder="Số người">
                
            </div>
            <div class="form-group">
                <label for="txtGia">Giá</label>
                <input type="int" class="form-control" name="gia" placeholder="Nhập Giá">
               
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Lưu lại</button>
        </form>
    </div>    
    </main>


<div id="forest-ext-shadow-host"></div></body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
</html>




