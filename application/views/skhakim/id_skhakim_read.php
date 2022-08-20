
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA ID_SKHAKIM</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nomor Surat</td>
				<td><?php echo $nomor_surat; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Surat</td>
				<td><?php echo $tgl_surat; ?></td>
			</tr>
	
			<tr>
				<td>Perihal</td>
				<td><?php echo $perihal; ?></td>
			</tr>
	
			<tr>
				<td>Jenis Sk</td>
				<td><?php echo $jenis_sk; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('skhakim') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>