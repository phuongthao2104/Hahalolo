<?php
// Include config file
include_once(__DIR__ . '/db/db.php');

$diachi = $_GET['diachi'];
$ngaynhanphong = $_GET['ngaynhanphong'];
$ngaytraphong = $_GET['ngaytraphong'];
$soluong = $_GET['soluong'];

$query = "";

if ($diachi) {
    $query .= " and diachi like '%$diachi%'";
}

if ($ngaynhanphong) {
    $format = date("Y-m-d", strtotime($ngaynhanphong));
    $query .= " and ngaynhanphong >= $format";
}

if ($ngaytraphong) {
    $format = date("Y-m-d", strtotime($ngaytraphong));
    $query .= " and ngaytraphong <= $format";
}

if ($soluong) {
    $query .= " and songuoi >= $soluong";
}


$sql = "SELECT distinct k.* FROM khachsan k join phong p on p.makhachsan = k.makhachsan  WHERE true $query";

//  echo$sql;
//  die();

$result = $conn->query($sql);

$posts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $posts[] = $row;
    }
}


$sqlDiachi = "SELECT distinct diachi FROM khachsan";


$danhsachdiachi = [];


$result = $conn->query($sqlDiachi);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $danhsachdiachi[] = $row;
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
    <link rel="stylesheet" href="css/hotel_detail.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
    <title>Tìm kiếm phòng</title>
    <link rel="stylesheet" href="./css/Header.css">
</head>

<body class="pb-4">
    <header>
        <?php include "./Header.php" ?>
    </header>
    <main class="main bg-light pt-5">
        <div class="container-sm bg-light" style="height: 100vh">
            <div class="row">
                <div class="left col-sm-3">
                    <form action="/Hahalolo/search.php" method="GET">
                        <div class="card">
                            <div class="carditem">
                                Bạn muốn ở đâu?
                                <div class="select-option">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <select name="diachi" class="form-select-01 border-0 " aria-label="Default select example">
                                        <option value="">Chọn nơi bạn muốn đến</option>
                                        <?php foreach ($danhsachdiachi as $item) : ?>
                                            <option value="<?= $item->diachi ?>" <?= $item->diachi === $diachi ? 'selected' : '' ?>><?= $item->diachi ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <hr>
                                Ngày nhận phòng
                                <div class="search_box_date search_box_item">
                                    <div class="input-group date datepicker">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        <input name="ngaynhanphong" t type="text" class="form-control">
                                    </div>
                                </div>
                                Ngày trả phòng
                                <div class="search_box_date search_box_item">
                                    <div class="input-group date datepicker">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                        <input name="ngaytraphong" type="text" class="form-control">
                                    </div>
                                </div>
                                Số người
                                <div class="select-option">
                                    <i class="fas fa-users"></i>
                                    <select name="soluong" class="form-select-01 border-0" aria-label="Default select example">
                                        <option value="">Chọn số lượng</option>

                                        <option value="1" <?= $soluong === "1" ? 'selected' : '' ?>>1 người </option>
                                        <option value="2" <?= $soluong === "2" ? 'selected' : '' ?>>2 người </option>
                                        <option value="3" <?= $soluong === "3" ? 'selected' : '' ?>>3 người </option>
                                        <option value="4" <?= $soluong === "4" ? 'selected' : '' ?>>4 người </option>
                                    </select>
                                </div>
                                <hr>
                                <button class="btnSearch">
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="right col-sm-9 mt-9">
                    <h4 style="font-weight: 400" class="mb-4">Những chỗ nghỉ phù hợp được tìm thấy <?= $diachi ? "ở $diachi" : "" ?>
                        <?= $ngaynhanphong ? "ngày nhận phòng $ngaynhanphong" : "" ?> <?= $ngaytraphong ? "ngày trả phòng $ngaytraphong" : "" ?> <?= $soluong ? "số người $soluong" : "" ?></h4>
                    <?php foreach ($posts as $post) : ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="card p-3 d-flex flex-row justify-content-between" style="height: 200px">
                                    <div class="d-flex">
                                        <div style="width: 300px">
                                            <img style="max-width: 100%;height: 100%" src="<?= strlen($post->anh) < 1 ? "https://vnpi-hcm.vn/wp-content/uploads/2018/01/no-image-800x600.png" : $post->anh ?>" alt="">
                                        </div>
                                        <div class="content ml-3">
                                            <h5>
                                                <?= $post->tenkhachsan; ?>
                                            </h5>
                                            <span> <?= $post->diachi ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column text-right">
                                        <span>Giá mỗi đêm</span>
                                        <h6 class="py-2" style="color: red;"><?= number_format($post->gia) ?> đ</h6>
                                        <a class="btn_primary" href="/Hahalolo/hotel_detail.php?makhachsan=MT1">Chọn phòng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </main>
    
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

            $('[name=ngaynhanphong]').datepicker('setDate','<?= $ngaynhanphong ?>');
            $('[name=ngaytraphong]').datepicker('setDate', '<?= $ngaytraphong ?>');
        });
    </script>
</body>

</html>