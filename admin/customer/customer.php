<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Hahalolo/admin/css/css1.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="products">
            <div class="nav row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Danh sách khách hàng</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="right-action text-right">
                        <div class="btn-groups d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='/Hahalolo/admin/room/add-room.php'"><i class="fa fa-plus"></i> Thêm Phòng
                            </button>
                            <button type="button" class="btn btn-success" onclick="window.location.href='/Hahalolo/admin/hotel/add-hotel.php'"><i class="fa fa-plus"></i> Thêm Khách Sạn</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-space orders-space"></div>

            <div class="products-content">
                
                <div class="room-main-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã khách hàng</th>
                                <th scope="col">Họ</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Quốc tịch</th>
                                <th scope="col">Thành phố</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Vùng này là Dữ liệu cần lặp lại hiển thị từ CSDL -->
                            <?php
                            // Bước 01: Kết nối Database Server
                            $conn = mysqli_connect('localhost', 'root', '', 'db_hahalolo');
                            if (!$conn) {
                                die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                            }
                            // Bước 02: Thực hiện truy vấn
                            $sql = "SELECT * FROM khachhang";
                            $result = mysqli_query($conn, $sql);
                            // Bước 03: Xử lý kết quả truy vấn
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['makh']; ?></th>
                                        <td><?php echo $row['ho']; ?></td>
                                        <td><?php echo $row['ten']; ?></td>
                                        <td><?php echo $row['sdt']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['quocgia']; ?></td>
                                        <td><?php echo $row['thanhpho']; ?></td>
                                        
                                    </tr>
                            <?php
                                }
                            }
                            // Bước 04: Đóng kết nối Database Server
                            mysqli_close($conn);
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="forest-ext-shadow-host"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>