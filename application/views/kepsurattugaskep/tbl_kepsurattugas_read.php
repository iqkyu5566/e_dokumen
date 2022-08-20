
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_KEPSURATTUGAS</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nomor St</td>
				<td><?php echo $nomor_st; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal St</td>
				<td><?php echo $tanggal_st; ?></td>
			</tr>
	
			<tr>
				<td>Perihal</td>
				<td><?php echo $perihal; ?></td>
			</tr>
	
			<tr>
				<td>Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('kepsurattugaskep') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>