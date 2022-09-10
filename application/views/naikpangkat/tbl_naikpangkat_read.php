
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_NAIKPANGKAT</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Periode</td>
				<td><?php echo $periode; ?></td>
			</tr>
	
			<tr>
				<td>Tahun</td>
				<td><?php echo $tahun; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>
	
			<tr>
				<td>Nama File</td>
				<td><?php echo anchor(site_url('assets/file_naikpangkat/'.$nama_file),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm", target="_blank"');  ?></td>
			</tr>

			<tr>
				<td></td>
				<td><a href="<?php echo site_url('naikpangkat') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>