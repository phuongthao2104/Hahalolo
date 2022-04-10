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
        <h5 class="text-center text-primary mt-5">Thêm mới khách sạn</h5>
        <!-- Form thêm Dữ liệu nhân viên -->
        <form action="add-hotel-process.php" method="post">
        <div class="form-group">
                <label for="txtMaks">Mã khách sạn</label>
                <input type="text" class="form-control" name="makhachsan" placeholder="Nhập Mã khách sạn">
            </div>
            <div class="form-group">
                <label for="txtTenks">Tên khách sạn</label>
                <input type="text" class="form-control" name="tenkhachsan" placeholder="Nhập tên khách sạn">
            </div>
            
            <div class="form-group">
                <label for="txtDiachi">Địa chỉ</label>
                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <label for="txtGia">Giá</label>
                <input type="int" class="form-control" name="gia" placeholder="Giá">
                
            </div>
            <div class="form-group">
                <label for="txtTich">Tiện ích</label>
                <input type="text" class="form-control" name="tienich" placeholder="Nhập Tiện ích">
            </div>
            <div class="form-group">
                <label for="txtTich">Ảnh</label>
                <input type="file" class="form-control" name="anh" placeholder="Chọn ảnh">
            </div>
            <div class="form-group">
                <label for="txtTich">Tổng quan</label>
                <input type="text" class="form-control" name="tongquan" placeholder="Nhập tổng quan">
            </div>
            <div class="form-group">
                <label for="txtTich">Quy tắc chung</label>
                <input type="text" class="form-control" name="quytacchung" placeholder="Nhập Quy tắc chung">
            </div>
            <div class="form-group">
                <label for="txtTich">Bản đồ</label>
                <input type="text" class="form-control" name="urlmap" placeholder="Nhập url map">
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




