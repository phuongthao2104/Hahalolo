<?php
// Include config file
include_once(__DIR__ . '/db/db.php');
// get posts
$sql = "SELECT * FROM khachsan";
$result = $conn->query($sql);

$posts = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_object()) {
    $posts[] = $row;
  }
}
//
// print_r($posts);
// die();
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
  <link rel="stylesheet" href="css/Home.css">
  <link rel="stylesheet" href="./css/Header.css">
  <title>Trang chủ | Tìm kiếm khách sạn</title>
</head>

<body class="pb-4">
  <header>
    <?php include "./Header.php" ?>
  </header>
  <main class="bg-light">
    <div class="container-sm bg-light">
      <div class="text">
        <p class="text1">Tìm nơi dừng chân hoàn hảo cùng Hahalolo!</p>
        <h6 style="margin-bottom:35px;">Từ những khu nghỉ dưỡng thanh bình đến những căn hộ sang trọng hiện đại</h6>
      </div>
      <form action="/Hahalolo/search.php" method="GET">
        <div class="search_box">
          <div class="search_box_location search_box_item">
            <div class="wrap-input">
              <span class="material-icons-outlined">
                location_on
              </span>
              <input type="text" placeholder="Nhập nơi bạn muốn đến" name="diachi">
              <span class="material-icons-outlined">
                close
              </span>
            </div>
          </div>
          <div class="search_box_date search_box_item">
            <div class="input-group date datepicker">
              <span class="input-group-append">
                <span class="input-group-text bg-white d-block">
                  <i class="fa fa-calendar"></i>
                </span>
              </span>
              <input type="text" class="form-control" name="ngaynhanphong">
            </div>
          </div>
          <div class="search_box_date search_box_item">
            <div class="input-group date datepicker">
              <span class="input-group-append">
                <span class="input-group-text bg-white d-block">
                  <i class="fa fa-calendar"></i>
                </span>
              </span>
              <input type="text" class="form-control" name="ngaytraphong">
            </div>
          </div>
          <div class="search_box_item search_box_people">
            <input placeholder="Nhập số lượng người" type="text" class="form-control" name="soluong">
          </div>
          <div class="btn_search">
            <button style="font-size: 20px; background: none; border:none" class="text-white">
              Tìm kiếm
            </button>
          </div>
        </div>
      </form>


      <!-- tìm kiếm -->

      <h5 class="mt-5 mb-3">Chỗ nghỉ nổi bật</h5>

      <div class="row">
        <?php foreach ($posts as $post) : ?>
          <div class="content_item col-grid-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card">
              <div class="img_item pe-3">
                <a href="./hotel_detail.php?makhachsan=<?= $post->makhachsan ?>">
                  <img src="<?= strlen($post->anh) < 1 ? "https://vnpi-hcm.vn/wp-content/uploads/2018/01/no-image-800x600.png" : $post->anh ?>" alt="...">
                </a>
              </div>
              <div class="card-body">
                <b class="card_titler"><?= $post->tenkhachsan; ?></b>
                <form action="">
                  <i class="fas fa-map-marker-alt"></i>
                  <a href="<?= $post->url_map ?>">
                    <?= $post->diachi ?>
                  </a>
                </form>
                <h7 class="card-text">Giá mỗi đêm</h7>
                <h6 style="color: red;"><?= number_format($post->gia) ?> đ</h6>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </main>


  <div class="container-sm">
    <div class="row">
      <div class="col-md-6 right">
        <img style="width: 100%;" src="./img/cườn cam.jpg" alt="">
        <h3>Mới lạ địa điểm check in vườn cam Mộc Châu đẹp ‘hút hồn’ team mê sống ảo</h3>
        <p>Những mô hình vườn cây trải nghiệm không chỉ mang lại nguồn thu nhập cho hộ gia đình mà nó còn góp phần vào
          việc phát triển ngành du lịch của địa phương. Nắm bắt được xu hướng này thì vườn cam Mộc Châu cũng đã xuất
          hiện và thu hút rất đông lượng du khách hàng năm.... </p>
        <a href="https://danatravel.vn/thong-tin-du-lich/bo-tui-10-dia-diem-check-in-cuc-dep-tai-moc-chau.html">Xem thêm</a>
      </div>

      <div class="col-md-6 left">
        <div class="row">
          <div class="col-md-6"><img class="image" style="width: 100% ;" src="./img/cà phê.jpg" alt=""></div>
          <div class="col-md-6">
            <h3>Mới lạ địa điểm check in vườn cam Mộc Châu đẹp ‘hút hồn’ team mê sống ảo</h3>
            <p>Những mô hình vườn cây trải nghiệm không chỉ mang lại nguồn thu nhập cho hộ gia đình mà nó còn góp phần
              vào việc phát triển ngành du lịch của địa phương. Nắm bắt được xu hướng này thì vườn cam Mộc Châu cũng
              đã xuất hiện và thu hút rất đông lượng du khách hàng năm....</p>
            <a href="">Xem thêm</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6"><img class="image" style="width:100% ;" src="./img/bikini.jpg" alt=""></div>
          <div class="col-md-6">
            <h3>Đóng Giáng sinh tại quán cà phê kiểu Âu ở Đà Lạt</h3>
            <p>🎅Với tiết trời se lạnh và khung cảnh lãng mạn, Đà Lạt là nơi hẹn hò lý tưởng cho các cặp đôi vào dịp lễ
              cuối năm. Đà Lạt (Lâm Đồng) níu chân du khách...</p>
            <a href="">Xem thêm</a>
          </div>


        </div>
        <div class="row">
          <div class="col-md-6"><img class="image" style="width:100% ;" src="./img/đà lạt.jpg" alt=""></div>
          <div class="col-md-6">
            <h3>Amiana Ưu đãi Đặc biệt – Vịnh Thiên Đường Mời Gọi Giá chỉ từ 1,750,000 VND</h3>
            <p>Trải nghiệm vẻ đẹp bình yên mang đến những phút giây thật sự thư giãn dành riêng cho bạn trong tiết trời
              sang thu đang dần trải dài trên nền cát trắng...</p>
            <a href="">Xem thêm</a>
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