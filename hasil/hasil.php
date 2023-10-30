<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="9" />
	<title>Hasil Pilsis</title>
	<script type="text/javascript" src="../js/Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>

<div class="container bg-hasil">
	<center>
		<h2>Hasil Pilsis </h2>
	</center>


	<?php 
	include '../koneksi.php';
	$query=mysqli_query($koneksi,"SELECT pilihan, COUNT( pilihan ) AS jumlah FROM transaksi WHERE pilihan NOT LIKE  '%k2%'GROUP BY pilihan");
	
	$query2=mysqli_query($koneksi,"SELECT pilihan, COUNT( pilihan ) AS jumlah FROM transaksi WHERE pilihan  LIKE  '%k2%'GROUP BY pilihan");
	
	?>

	<table class="table">
		<tr>
			<td>
			<h3>Hasil Ketua Umum</h3>
				<canvas id="myChart""></canvas>
				<table border="1">
					<tr>
						<th>Pilihan</th>
						<th>Jumlah</th>
					</tr>	
					<?php
					$jumlah=0;
					while($data=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $data['pilihan']  ?></td>
							<td><?php echo $data['jumlah']  ?></td>
						</tr>
					<?php 	
					$jumlah=$jumlah+$data['jumlah'] ;
					}
					?>
				</table>
				<h4>Jumlah= <?php echo $jumlah  ?></h4>
			</td>
			<td>
			<h3>Hasil Ketua 1&2</h3>
				<canvas  id="myChart2"></canvas>
				<table border="1">
					<tr>
						<th>Pilihan</th>
						<th>Jumlah</th>
					</tr>	
					<?php
					$jumlah2=0;
					while($data=mysqli_fetch_array($query2)){
						?>
						<tr>
							<td><?php echo $data['pilihan']  ?></td>
							<td><?php echo $data['jumlah']  ?></td>
						</tr>
					<?php 	
					$jumlah2=$jumlah2+$data['jumlah'] ;
					}
					?>
				</table>
				<h4>Jumlah 2= <?php echo  $jumlah2  ?></h4>
			</td>
		</tr>
	</table>


	<br/>
	<br/>

	

	<script>
		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pilihan 1", "Pilihan 2 ", "Pilihan 3", "Pilihan 4"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$pilihan1 = mysqli_query($koneksi,"select * from transaksi where pilihan='pil-k2.1'");
					echo mysqli_num_rows($pilihan1);
					?>, 
					<?php 
					$pilihan2 = mysqli_query($koneksi,"select * from transaksi where pilihan='pil-k2.2'");
					echo mysqli_num_rows($pilihan2);
					?>, 
					<?php 
					$pilihan3 = mysqli_query($koneksi,"select * from transaksi where pilihan='pil-k2.3'");
					echo mysqli_num_rows($pilihan3);
					?>
					, 
					<?php 
					$pilihan4 = mysqli_query($koneksi,"select * from transaksi where pilihan='pil-k2.4'");
					echo mysqli_num_rows($pilihan4);
					?>
				
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pilihan 1", "Pilihan 2 ", "Pilihan 3"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$pilihan1 = mysqli_query($koneksi,"select * from transaksi where pilihan='pil1'");
					echo mysqli_num_rows($pilihan1);
					?>, 
					<?php 
					$pilihan2 = mysqli_query($koneksi,"select * from transaksi where pilihan='pil2'");
					echo mysqli_num_rows($pilihan2);
					?>, 
					<?php 
					$pilihan3 = mysqli_query($koneksi,"select * from transaksi where pilihan='pil3'");
					echo mysqli_num_rows($pilihan3);
					?>
				
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>