<?php
// Include config file
include_once(__DIR__ . '/db/db.php');
// get posts
$sqlAll = "SELECT distinct hoadon.*, phong.*, khachsan.* FROM hoadon
        JOIN phong on hoadon.maphong = phong.maphong
        JOIN khachsan on phong.makhachsan = khachsan.makhachsan
        ORDER BY id desc       
        ";

$result = $conn->query($sqlAll);

$all = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $all[] = $row;
    }
}

$sqlChoXacNhan = "SELECT distinct hoadon.*, phong.*, khachsan.* FROM hoadon
        JOIN phong on hoadon.maphong = phong.maphong
        JOIN khachsan on phong.makhachsan = khachsan.makhachsan
        WHERE hoadon.trangthai = 'cho-xac-nhan'
        ORDER BY id desc       
        ";

$result = $conn->query($sqlChoXacNhan);

$choXacNhan = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $choXacNhan[] = $row;
    }
}
// lấy dữ liệu
$sqlChoPhucVu = "SELECT distinct hoadon.*, phong.*, khachsan.* FROM hoadon
        JOIN phong on hoadon.maphong = phong.maphong
        JOIN khachsan on phong.makhachsan = khachsan.makhachsan
        WHERE hoadon.trangthai = 'cho-phuc-vu'
        ORDER BY id desc       
        ";

$result = $conn->query($sqlChoPhucVu);

$choPhucvu  = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $choPhucvu [] = $row;
    }
}


$sqlDangPhucVu= "SELECT distinct hoadon.*, phong.*, khachsan.* FROM hoadon
        JOIN phong on hoadon.maphong = phong.maphong
        JOIN khachsan on phong.makhachsan = khachsan.makhachsan
        WHERE hoadon.trangthai = 'dang-phuc-vu'
        ORDER BY id desc       
        ";

$result = $conn->query($sqlDangPhucVu);

$dangPhucvu = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $dangPhucvu [] = $row;
    }
}


$sqlHoanThanh= "SELECT distinct hoadon.*, phong.*, khachsan.* FROM hoadon
        JOIN phong on hoadon.maphong = phong.maphong
        JOIN khachsan on phong.makhachsan = khachsan.makhachsan
        WHERE hoadon.trangthai = 'hoan-thanh'
        ORDER BY id desc       
        ";

$result = $conn->query($sqlHoanThanh);

$hoanThanh = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $hoanThanh [] = $row;
    }
}

$sqlDaHuy= "SELECT distinct hoadon.*, phong.*, khachsan.* FROM hoadon
        JOIN phong on hoadon.maphong = phong.maphong
        JOIN khachsan on phong.makhachsan = khachsan.makhachsan
        WHERE hoadon.trangthai = 'hoan-thanh'
        ORDER BY id desc       
        ";

$result = $conn->query($sqlDaHuy);

$daHuy = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $daHuy [] = $row;
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="css/BookHotelRoom.css">
    <link rel="stylesheet" href="./css/Header.css">
    <title>Hahalolo | Quản lý đơn hàng</title>
</head>

<body class="pb-4">
    <header>
        <?php include "./Header.php" ?>
    </header>
    <div class='main bg-light' style="min-height: 100vh">
        <div class="row-container-sm bg-light">
            <div class='main_header'>
                <h3 class="p-3 pb-1">Quản lý đơn hàng</h3>
            </div>
            <div class="container">
                <div class="row">
                    <div class="card">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tat-ca" type="button" role="tab" aria-controls="tat-ca" aria-selected="true">Tất cả (<?= count($all) ?>)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#cho-xac-nhan" type="button" role="tab" aria-controls="cho-xac-nhan" aria-selected="false">Đang chờ xác nhận (<?= count($choXacNhan) ?>)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#cho-phuc-vu" type="button" role="tab" aria-controls="cho-phuc-vu" aria-selected="false">Đang chờ phục vụ (<?= count($choPhucvu) ?>)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#dang-phuc-vu" type="button" role="tab" aria-controls="dang-phuc-vu" aria-selected="false">Đang phục vụ (<?= count($dangPhucvu) ?>)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#hoan-thanh" type="button" role="tab" aria-controls="hoan-thanh" aria-selected="false">Hoàn thành (<?= count($hoanThanh) ?>)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#da-huy" type="button" role="tab" aria-controls="da-huy" aria-selected="false">Đã hủy (<?= count($daHuy) ?>)</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tat-ca" role="tabpanel" aria-labelledby="home-tab">
                                <div class="py-4">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã hóa đơn</th>
                                                <th scope="col">Khách sạn</th>
                                                <th scope="col">Phòng</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col">Ngày nhận phòng</th>
                                                <th scope="col">Ngày trả phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($all as $item) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $item->id ?></td>
                                                    <td><?= $item->tenkhachsan ?></td>
                                                    <td><?= $item->tenphong ?></td>
                                                    <td><?= $item->tongtien ?> đ</td> 
                                                    <td><?= date("d-m-Y", strtotime($item->ngaynhanphong)) ?></td>
                                                    <td><?= $item->ngaytraphong ? date("d-m-Y", strtotime($item->ngaytraphong)) : "" ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="cho-xac-nhan" role="tabpanel" aria-labelledby="cho-xac-nhan-tab">
                                <div class="py-4">

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã hóa đơn</th>
                                                <th scope="col">Khách sạn</th>
                                                <th scope="col">Phòng</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col">Ngày nhận phòng</th>
                                                <th scope="col">Ngày trả phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($choXacNhan as $item) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $item->id ?></td>
                                                    <td><?= $item->tenkhachsan ?></td>
                                                    <td><?= $item->tenphong ?></td>
                                                    <td><?= $item->tongtien ?> đ</td> 
                                                    <td><?= date("d-m-Y", strtotime($item->ngaynhanphong)) ?></td>
                                                    <td><?= $item->ngaytraphong ? date("d-m-Y", strtotime($item->ngaytraphong)) : "" ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cho-phuc-vu" role="tabpanel" aria-labelledby="cho-phuc-vu-tab">
                                <div class="py-4">

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã hóa đơn</th>
                                                <th scope="col">Khách sạn</th>
                                                <th scope="col">Phòng</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col">Ngày nhận phòng</th>
                                                <th scope="col">Ngày trả phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($choPhucvu as $item) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $item->id ?></td>
                                                    <td><?= $item->tenkhachsan ?></td>
                                                    <td><?= $item->tenphong ?></td>
                                                    <td><?= $item->tongtien ?> đ</td> 
                                                    <td><?= date("d-m-Y", strtotime($item->ngaynhanphong)) ?></td>
                                                    <td><?= $item->ngaytraphong ? date("d-m-Y", strtotime($item->ngaytraphong)) : "" ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dang-phuc-vu" role="tabpanel" aria-labelledby="dang-phuc-vu-tab">
                                <div class="py-4">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã hóa đơn</th>
                                                <th scope="col">Khách sạn</th>
                                                <th scope="col">Phòng</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col">Ngày nhận phòng</th>
                                                <th scope="col">Ngày trả phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($dangPhucvu as $item) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $item->id ?></td>
                                                    <td><?= $item->tenkhachsan ?></td>
                                                    <td><?= $item->tenphong ?></td>
                                                    <td><?= $item->tongtien ?> đ</td> 
                                                    <td><?= date("d-m-Y", strtotime($item->ngaynhanphong)) ?></td>
                                                    <td><?= $item->ngaytraphong ? date("d-m-Y", strtotime($item->ngaytraphong)) : "" ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="hoan-thanh" role="tabpanel" aria-labelledby="hoan-thanh-tab">
                                <div class="py-4">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã hóa đơn</th>
                                                <th scope="col">Khách sạn</th>
                                                <th scope="col">Phòng</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col">Ngày nhận phòng</th>
                                                <th scope="col">Ngày trả phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($hoanThanh as $item) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $item->id ?></td>
                                                    <td><?= $item->tenkhachsan ?></td>
                                                    <td><?= $item->tenphong ?></td>
                                                    <td><?= $item->tongtien ?> đ</td> 
                                                    <td><?= date("d-m-Y", strtotime($item->ngaynhanphong)) ?></td>
                                                    <td><?= $item->ngaytraphong ? date("d-m-Y", strtotime($item->ngaytraphong)) : "" ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="da-huy" role="tabpanel" aria-labelledby="da-huy-tab">
                                <div class="py-4">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Mã hóa đơn</th>
                                                <th scope="col">Khách sạn</th>
                                                <th scope="col">Phòng</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col">Ngày nhận phòng</th>
                                                <th scope="col">Ngày trả phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($daHuy as $item) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $item->id ?></td>
                                                    <td><?= $item->tenkhachsan ?></td>
                                                    <td><?= $item->tenphong ?></td>
                                                    <td><?= $item->tongtien ?> đ</td> 
                                                    <td><?= date("d-m-Y", strtotime($item->ngaynhanphong)) ?></td>
                                                    <td><?= $item->ngaytraphong ? date("d-m-Y", strtotime($item->ngaytraphong)) : "" ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy'
            });
        });
    </script>
</body>


</html>