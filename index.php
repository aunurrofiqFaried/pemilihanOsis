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
  <link rel="stylesheet" type="text/css" href="css/custom_budi.css">

</head>

<body>
  <!-- header halaman -->
  <div class="bg-vote">
    <div class="bg-text" id="vote">
      <h2>Pemilihan Ketua OSIS </h2>
      <h3>SMK Negeri Takeran</h3>
      <h4>Tahun 2020/2021</h4>
      <a href="#token" role="button" class="btn btn btn-primary btn-lg font-weight-bold" style="margin-top: 16px;">VOTE NOW</a>
    </div>
  </div>
  <!-- end header halaman -->

  <!-- form token -->
  <div id="token" class=" row bg-form">
    <div class="card card-login mx-auto my-auto">
      <div class="card-header text-center font-weight-bolder">
        Masukkan Token
      </div>
      <div class="card-body">
        <form method="post" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input name="token" type="password" id="inputPassword" class="form-control" placeholder="TOKEN" required="required">
              <label for="inputPassword"></label>
            </div>
          </div>
          <button name="proses" class="btn btn-lg btn-primary btn-block">Proses</button>
        </form>
        <?php
            if(isset($_POST['proses'])){
               $token=$_POST['token'];
                $query=mysqli_query($koneksi,"select * from token where token='$token' and status='Y'");
                $cek=mysqli_num_rows($query);
               if($cek>0){
                 session_start();
                   $query=mysqli_query($koneksi,"update token set status='N' where token='$token' ");
                   //header('location:pilihan.php');
                    echo "<script>window.location.href='pilihan.php';</script>";
                    exit;
               }
               else{
                 ?>
                <div class="alert alert-danger" role="alert" style="margin-top: 10px;">
                    Token Salah Atau Sudah Digunakan
                </div>
              <?php
               }
            }
        ?>
      </div>
    </div>
  </div>
<!-- end fom token -->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
<script>
  $(document).ready(function(){
    // Add scrollspy to <body>
    $('body').scrollspy({target: ".bg-vote", offset: 50});   

    // Add smooth scrolling on all links inside the navbar
    $("#vote a").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      }  // End if
    });
  });
</script>
</html>
