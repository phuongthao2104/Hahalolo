<?php
// Include config file
include_once(__DIR__ . '/db/db.php');

// get hotels

$id = $_GET['makhachsan'];
$sql = "SELECT * FROM khachsan WHERE makhachsan='$id'";
$result = $conn->query($sql);

$hotel = null;

if ($result->num_rows > 0) {
  $hotel = $result->fetch_object();
}

$sql = "SELECT * FROM phong WHERE makhachsan='$id'";
$result = $conn->query($sql);

$rooms = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_object()) {
    $rooms[] = $row;
  }
}


$sql = "SELECT * FROM khachsan limit 4";
$result = $conn->query($sql);

$relateds = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_object()) {
    $relateds[] = $row;
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
  <title><?= $hotel->tenkhachsan ?></title>
  <link rel="stylesheet" href="./css/Header.css">
</head>

<body class="pb-4">
  <header>
    <?php include "./Header.php" ?>
  </header>
  <main class="main bg-light pt-5">
    <div class="container-sm bg-light">
      <div class="row">
        <div class="left col-sm-3">
          <form action="/Hahalolo/search.php" method="GET">
            <div class="card">
              <div class="carditem">
                B???n mu???n ??? ????u?
                <div class="select-option">
                  <i class="fas fa-map-marker-alt"></i>
                  <select name="diachi" class="form-select-01 border-0 " aria-label="Default select example">
                    <option value="">Ch???n n??i b???n mu???n ?????n</option>
                    <option value="1">Fairfield Inn and Stes Marriott</option>
                    <option value="2">Hampton Inn Utica</option>
                    <option value="3">Vissai SAIGON Hottel</option>
                  </select>
                </div>
                <hr>
                Ng??y nh???n ph??ng
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
                Ng??y tr??? ph??ng
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
                S??? ng?????i
                <div class="select-option">
                  <i class="fas fa-users"></i>
                  <select name="soluong" class="form-select-01 border-0" aria-label="Default select example">
                    <option value="">Ch???n s??? l?????ng</option>
                    <option value="1">1 ng?????i </option>
                    <option value="2">2 ng?????i </option>
                    <option value="3">3 ng?????i </option>
                    <option value="4">4 ng?????i </option>
                  </select>
                </div>
                <hr>
                <button class="btnSearch">
                  T??m ki???m
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="right col-sm-9 mt-9">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h1><?= $hotel->tenkhachsan ?></h1>
              <h6 style="color: #3d91d6;"><i class="fas fa-map-marker-alt"></i> <?= $hotel->diachi ?></h6>
            </div>
            <a class="btn btn-primary" href="#">
              Xem tr??n b???n ?????
            </a>
          </div>
          <div class="button_right">
            <ul class="nav nav-pills nav-fill mb-2">
              <li class="nav-item ml-0">
                <a class="nav-link text-primary border border-primary " href="#">T???ng quan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark border border-dark " href="#roomInfo">Th??ng tin ph??ng v?? gi??</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark border border-dark" href="">Ti???n nghi</a>
              </li>
              <li class="nav-item mr-0">
                <a class="nav-link text-dark border border-dark" href="#">Quy t???c chung</a>
              </li>
            </ul>
          </div>
          <div class="row mb-4">
            <div class="col-md-12 bg-white text-secondary p-3">
              <?= $hotel->tongquan ?>
            </div>
          </div>

          <div id="#roomInfo">
            <h5 class="my-4" style="margin-left: -12px; font-weight: 400">
              Ch???n ph??ng t???i <?= $hotel->tenkhachsan ?>
            </h5>
            <?php foreach ($rooms as $room) : ?>
              <div class="row my-3 khungdatphongbenduoi">
                <div class="col-md-4 anhphong">
                  <h5 class="text-black mt-2 ms-2"><?= $room->tenphong ?></h5>
                  <img class="img-fluid  ps-2 pe-2 mb-2 mt-2" src="<?= strlen($room->anh) < 1 ? "https://vnpi-hcm.vn/wp-content/uploads/2018/01/no-image-800x600.png" : $room->anh ?>" alt="">
                  <a href="" class="text-primary ms-2" style="text-decoration: none; font-weight: 700;">Chi ti???t ph??ng</a>
                  <p class="text-secondary mt-2 ms-2"> 1 King size </p>
                </div>
                <div class="col-md-1 anhphong">
                  <p class="ps-2 pe-2 mb-2 mt-2">X1</p>
                </div>
                <div class="col-md-2 anhphong">
                  <h5 class="ps-2 pe-2 mb-2 mt-2 text-black">Ti???n ??ch</h5>
                  <p class="ps-2 pe-2 mb-2 mt-2 text-success" style="font-size:12px">
                    <?= $room->tienich ?>
                  </p>

                </div>
                <div class="col-md-2 anhphong">
                  <p class="ps-2 pe-2 mb-2 mt-2 text-secondary text-end" style="font-size:12px">Gi?? m???i ????m</p>
                  <h4 class="ps-2 pe-2 mb-2 mt-2 text-danger text-end"><?= number_format($room->gia) ?>??</h4>
                </div>
                <div class="col-md-3 ">
                  <a href="BookHotelRoom.php?maphong=<?= $room->maphong ?>" class="btn text-white ms-5 mb-2 mt-5 " style="border-radius:25px ; background-color: rgb(5, 140, 158); ">?????t 1 ph??ng</a>
                  <br>
                  <a href="" style="font-size : 12px;text-decoration: none;" class=" mb-2 mt-2 ms-5 ;color: rgb(5, 140, 158);   ">??i???u ki???n v?? ch??nh s??ch</a>
                  <p class=" mb-2 mt-5 text-secondary text-center">1 ph??ng/1 ????m</p>
                  <h4 class=" mb-2 mt-3 text-center text-danger"><?= number_format($room->gia) ?>??</h4>
                  <a class=" mb-2 mt-5 ms-5" href="" style="font-size: 12px ; text-decoration: none ;color: rgb(5, 140, 158);">Thay ?????i s??? l?????ng ph??ng</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div id="#utilities">
            <h5 class="my-4" style="margin-left: -12px; font-weight: 400">
              C??c ti???n nghi c???a <?= $hotel->tenkhachsan ?>
            </h5>
            <div class="my-2">
              <?= $hotel->tienich ?>
            </div>
          </div>

          <div id="#syntax">
            <h5 class="my-4" style="margin-left: -12px; font-weight: 400">
              Quy t???c chung
            </h5>
            <h6><?= $hotel->tenkhachsan ?> nh???n y??u c???u ?????c bi???t - g???i y??u c???u trong b?????c k??? ti???p!</h6>
            <div class="alert alert-success">
              <?= $hotel->quytacchung ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <div class="footer container-sm mt-2">
    <div class="footer_container mt-4">
      <h4>Nh???ng ch??? ngh??? ph??? bi???n v?? t????ng t??? v???i kh??ch s???n HAMPTON INN UTICA</h4>
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <?php foreach ($relateds as $item) : ?>
                <div class="content_item col-grid-xs-12 col-sm-6 col-md-4 col-lg-3">
                  <div class="card">
                    <a href="./item_detail.php?makhachsan=<?= $item->makhachsan ?>">
                      <img src="<?= strlen($item->anh) < 1 ? "https://vnpi-hcm.vn/wp-content/uploads/2018/01/no-image-800x600.png" : $item->anh ?>" alt="...">
                    </a>
                    <div class="card-body">
                      <b class="card_titler"><?= $item->tenkhachsan; ?></b>
                      <form action="">
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="<?= $item->url_map ?>">
                          <?= $item->diachi ?>
                        </a>
                      </form>
                      <h7 class="card-text">Gi?? m???i ????m</h7>
                      <h6 style="color: red;"><?= number_format($item->gia) ?> ??</h6>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
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