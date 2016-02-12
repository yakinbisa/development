<div class="pembuka">
	<h1>Data Anggota</h1>
</div>







<div class="isi">
	
	<table>
		
		<thead>
			<th>No.</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Usia</th>
			<th>Kelas</th>
		</thead>


		<tbody>
			<?php
				$data = new Database();

				$kumpulan_data = $data->tampilkan_anggota();

				$nomor = 1;

				while($per_baris = $kumpulan_data->fetch_object()) {
			?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $per_baris->Nama; ?></td>
				<td><?php echo $per_baris->JenisKelamin; ?></td>
				<td><?php echo $per_baris->Usia; ?></td>
				<td><?php echo $per_baris->Kelas; ?></td>
			</tr>
			<?php } ?>
		</tbody>

	</table>

</div>






<div class="penutup"></div>
