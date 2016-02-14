<div class="pembuka">
	<h1>Data Anggota</h1>
</div>




<?php
	$kumpulan_data = $data->pagination_part_1_2(10, @$_GET['hal']);
	$semua_data = $data->tampilkan_anggota();
?>


<div class="isi">
	
	<div class="atas-tabel-profil">
		
	</div>

	<div class="atas-tabel-info">
		<p><em>Total <strong><?php echo $semua_data->num_rows; ?></strong> Anggota</em></p>
	</div>

	<table>
		
		<thead>
			<th>No.</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Asal</th>
			<th>Usia</th>
			<th>Kelas</th>
		</thead>


		<tbody>
			<?php

				$nomor = 1;

				while($per_baris = $kumpulan_data->fetch_object()) {
			?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $per_baris->Nama; ?></td>
				<td><?php echo $per_baris->JenisKelamin; ?></td>
				<td><?php echo $per_baris->Asal; ?></td>
				<td><?php echo $per_baris->Usia; ?></td>
				<td><?php echo $per_baris->Kelas; ?></td>
			</tr>
			<?php } ?>
		</tbody>

	</table>
	<hr>
	<?php
		$data->pagination_part_2_2();
	?>

</div>






<div class="penutup"></div>
