<?php

$pil= $_GET['nama'];
include "koneksi.php";
$query=mysqli_query($koneksi,"insert into transaksi(pilihan) values('$pil')");
header('location:pilihan2.php');
?>