<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="js/">
    <link rel="stylesheet" href="css/Register.css">
    <title>Đăng ký</title>
</head>
<body>
<main> 
<div class="logo container-sm">
  <div class="row">
    <a href="./img/logo.png"></a>
    <h3>Hahalolo</h3>
  </div>

</div>
<div class="card container-sm">
  <div class="card-body">
  <form action="process_register.php" method="post">
    <h4>Đăng ký</h4>
  <div class="row">
    <div class="form-group col-md-6 mb-4">
      <label for="inputTen">Tên</label>
      <input type="text" class="form-control" name="ten" id="inputTen" placeholder="Nhập tên của bạn">
    </div>
    <div class="form-group col-md-6 mb-4">
    <label for="inputHo">Họ đệm</label>
      <input type="text" class="form-control" name="ho" id="inputHo" placeholder="Nhập họ đệm của bạn">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Nhập email của bạn">
  </div>
  <div class="form-group">
    <label for="inputPass1">Mật khẩu</label>
    <input type="password" name="password" class="form-control" id="inputPass1" placeholder="Mật khẩu">
  </div>
  <div class="form-group">
  <label for="inputPass2">Xác nhận mật khẩu</label>
    <input type="password" name="cpassword" class="form-control" id="inputPass2" placeholder="Xác nhận mật khẩu">
  </div>
  <button type="submit" name="btnSubmit" class="btn btn-primary">Đăng ký</button>
</form>
</div>
  
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
</html>