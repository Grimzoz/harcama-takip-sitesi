<?php
require_once('baglan.php');
error_reporting(0);
?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/app.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Giriş</title>
</head>
<body>
<?php 
if(!is_null($_SESSION['user_id']))
{
  header('Location: hareketler.php');
  
}?>


<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">GİRİŞ</h5>

            <form action="#" method="post" id="baslik_form" onsubmit="return false;">
            
              <div class="form-label-group">
                <label for="inputEmail">Kullanıcı Adı</label>
                <input type="text" name="kadi" class="form-control" id="kadi" placeholder="Kullanıcı Adı" required autofocus>
              </div>
              <br>


              <div class="form-label-group">
              <label for="inputPassword">Şifre</label>
                <input type="password" name="sifre" class="form-control" id="sifre" placeholder="Şifre">
               
              </div>

              <div class="custom-control custom-checkbox mb-3">
                
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="btncu">Giriş Yap</button>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 
</body>





</html>