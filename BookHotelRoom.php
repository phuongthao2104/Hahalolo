<?php
// Include config file
include_once(__DIR__ . '/db/db.php');

$id = $_GET['maphong'];
$sql = "SELECT * FROM phong WHERE maphong='$id'";
$result = $conn->query($sql);
$room = null;

if ($result->num_rows > 0) {
  $room = $result->fetch_object();
}
//thông tin khách sạn
$sql = "SELECT * FROM khachsan WHERE makhachsan='$room->makhachsan'";
$result = $conn->query($sql);

$hotel = null;

if ($result->num_rows > 0) {
  $hotel = $result->fetch_object();
}

// nút thanh toán
if (isset($_POST['create-order']) &&  $_POST['create-order']) {


  $email = $_POST['email'];
  $ho = $_POST['ho'];
  $ten = $_POST['ten'];
  $quocgia = $_POST['quocgia'];
  $makh = null;

  // them khach hang

  $sql = "SELECT id FROM khachhang order by id desc limit 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $lastCustomer = $result->fetch_object();
    $makh = "KH000" . ($lastCustomer->id + 1);
  } else {
    $makh = "KH0001";// chưa có bản ghi
  }


  $sql = "INSERT INTO khachhang
  (email, ho,ten,quocgia,makh) 
  VALUES('$email', '$ho','$ten','$quocgia','$makh');";

  if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    die();
  }

  // them hoa don 

  $email = $_POST['email'];
  $mahd = null;

  $sql = "SELECT id FROM hoadon order by id desc limit 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $lastCustomer = $result->fetch_object();
    $mahd = "KH000" . ($lastCustomer->id + 1);
  } else {
    $mahd = "KH0001";
  }

  $sql = "INSERT INTO hoadon
  (mahd,makh,gia,maphong,tongtien, trangthai) 
  VALUES('$mahd', '$makh','$room->gia','$id','$room->gia', 'cho-xac-nhan');";

  if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    die();
  }




  $sql = "INSERT INTO chitiethoadon
  (mahd,ngaynhanphong,ngaytraphong,songuoi) 
  VALUES('$mahd', '$room->ngaynhanphong','$room->ngaytraphong','$room->songuoi');";

  if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    die();
  }



  $message = "Đặt phòng thành công, chúng tôi sẽ liên hệ lại cho bạn";

  // them chi tiet hoa don

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Đặt phòng</title>
  <link rel="stylesheet" href="css/BookHotelRoom.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/Header.css">
</head>

<body class="pb-4">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <header>
    <?php include "./Header.php" ?>
  </header>
  <div class='main bg-light'>
    <div class="row-container-sm bg-light">
      <div class='main_header'>
        <h3 class="p-3 pb-1">Thông tin đặt phòng</h3>
      </div>
      <div class="container">
        <div class="row">
          <?php if (isset($_POST['create-order']) &&  $_POST['create-order']) : ?>
            <div class="alert alert-primary"><?= $message ?></div>
          <?php endif ?>
          <div class="left col-sm-8">
            <div class="row card mt-3 pe-3 pb-4 thongtinkhach">
              <h5 class="p-2">Thông tin người liên hệ</h5>
              <form class="row g-4" method="post">
                <div class="d-flex me-1">
                  <div class="form-body-item col-md-6">
                    <label for="validationServerUsername" class="form-label">Họ*</label>
                    <div class="input-group has-validation">
                      <input name="ho" type="text" class="form-control is-invalid border border-1" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                      <div id="validationServerUsernameFeedback " class="invalid-feedback text-black-50">
                        Họ tên như trên CMND/CCCD/Hộ chiếu (không dấu).
                      </div>
                    </div>
                  </div>
                  <div class="form-body-item col-md-6 ms-3 ">
                    <label for="validationServer02" class="form-label">Tên đệm & tên*</label>
                    <input name="ten" type="text" class="form-control " id="validationServer02" value="" required>
                  </div>
                </div>

                <div class="d-flex me-1 mt-6">
                  <div class="form-body-item col-md-6 ">
                    <label for="validationServer02" class="form-label">Số điện thoại*</label>
                    <input name="sdt" type="text" class="form-control " id="validationServer02" value="" required>
                  </div>
                  <div class="form-body-item col-md-6 ms-3">
                    <label for="validationServer03" class="form-label">Email*</label>
                    <input name="email" type="text" class="form-control " id="validationServer03" aria-describedby="validationServer03Feedback" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                    </div>
                  </div>
                </div>
                <div class="form-body-item col-md-6 mt-6">
                  <label for="validationServer04" class="form-label">Quốc gia</label>
                  <select name="quocgia" class="form-select " aria-label="Default select example">
                    <option selected>Việt Nam</option>
                    <option value="1">Trung quốc</option>
                    <option value="2">Thái Lan</option>
                    <option value="3">Hàn Quốc</option>
                </div>
                <div class="form-body-item col-mb-6 mt-3 form-check ">

                  <input style="display:none" type="checkbox" class="form-check-input" id="exampleCheck1">

                  <!-- <label class="form-check-label" for="exampleCheck1">Tôi là người lưu trú</label> -->

                  <input name="create-order" type="submit" class="btn_payment btn btn-info mt-3 mx-0" value="Thanh toán" />
                </div>
              </form>
            </div>

          </div>
          <div class="right col-sm-4 mt-3">
            <div class="card">
              <h5 class="p-3 card_titler">Thông tin phòng</h5>
              <img src="<?= strlen($room->anh) < 1 ? "https://vnpi-hcm.vn/wp-content/uploads/2018/01/no-image-800x600.png" : $room->anh ?>" class="mt-3" alt="...">
              <div class="card-body">
                <b class="card_titler"> <?= $hotel->tenkhachsan ?></b>
                <i class="d-block">
                  <?= $hotel->diachi ?></a>
                </i>
                <div class="text_item d-flex">
                  <p style="width:70% ">Bạn đã chọn</p>
                  <div>
                    <p> <?= $room->tenphong ?> </p>
                    <a href="/hotel_detail.php?makhachsan=<?= $hotel->makhachsan ?>" style="font-size: 12px " class="text-info">Thay đổi lựa chọn</a>
                  </div>

                </div>
                <div class="text_item d-flex">
                  <p style="width:30% ">Nhận phòng</p>
                  <p><?= date("d-m-Y", strtotime($room->ngaynhanphong)) ?></p>
                </div>
                <div class="text_item d-flex">
                  <p style="width:30% ">Trả phòng </p>
                  <p><?= $room->ngaytraphong ? date("d-m-Y", strtotime($room->ngaytraphong)) : "Chưa xác định" ?></p>
                </div>
                <div class="text_item d-flex">
                  <p style="width:30% ">Khách lưu trú</p>
                  <p> <?= $room->songuoi ?> người </p>
                </div>
              </div>
            </div>
            <div class="card mt-3">
              <h5 class="p-3 mt-3 card_titler">Chi tiết giá phòng của bạn</h5>
              <div class="card-body">
                <div class="text_bodẻ_item border rounded-3 d-flex mb-2">
                  <div class="text_item_price p-2">
                    <p style="font-size: 12px"> (Giá 1 phòng, 1 đêm)</p>
                    <p><?= number_format($room->gia) ?> đ</p>
                  </div>
                </div>
                <div class="text_item d-flex text-info">
                  <p style="width:80% ">Thuế và phí</p>
                  <?= number_format($room->gia) ?> đ
                </div>
                <div class="text_item d-flex">
                  <p style="width:80% ">Phí thanh toán</p>
                  <p>0đ</p>
                </div>
                <div class="text_item d-flex">
                  <p style="width:80% ">Tổng thanh toán</p>
                  <?= number_format($room->gia) ?> đ
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>

</body>

</html>