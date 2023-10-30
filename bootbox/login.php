<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Skanet Pilsis</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Masukkan Token</div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            
          </div>
          
          <div class="form-group">
            <div class="form-label-group">
              <input name="token" type="password" id="inputPassword" class="form-control" placeholder="TOKEN" required="required">
              <label for="inputPassword"></label>
            </div>
          </div>
          
         
          <button name="proses" class="btn-primary btn-block">Proses</button>
        </form>
        <?php
    if(isset($_POST['proses'])){
       $token=$_POST['token'];
        echo "proses";
        $query=mysqli_query($koneksi,"select * from token where token='$token' and status='Y'");
        $cek=mysqli_num_rows($query);
       if($cek>0){
         session_start();
           
           echo $token;
           $query=mysqli_query($koneksi,"update token set status='N' where token='$token' ");
       }
       else{
         ?>
        <div class="alert alert-danger" role="alert">
       Token Salah Atau Sudah Digunakan
      </div>
      <?php
       }
    }

?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
