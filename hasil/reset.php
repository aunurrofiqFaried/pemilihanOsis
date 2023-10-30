<?php
include "../koneksi.php";
$query= mysqli_query($koneksi,"delete from transaksi");
$query= mysqli_query($koneksi,"update  token set status='Y'");
if($query){
    echo "Data berhasil direset";
}

?>