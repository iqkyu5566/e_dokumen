
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_PELAPORAN_DIPA</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Jenis Laporan</td>
				<td><?php echo $jenis_laporan; ?></td>
			</tr>
	
			<tr>
				<td>Jenis Dipa</td>
				<td><?php echo $jenis_dipa; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>
	
			<tr>
				<td>Nama File</td>
				<td><?php echo $nama_file; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('pelaporan_dipa') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>