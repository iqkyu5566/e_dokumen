
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_LAPKEGIATAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Kegiatan</td>
				<td><?php echo $nama_kegiatan; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Pelaksanaan</td>
				<td><?php echo $tgl_pelaksanaan; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>

			<tr>
				<td>Nama File</td>
				<td><?php echo anchor(site_url('assets/file_laporankegiatan/'.$nama_file),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm", target="_blank"');  ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('lapkegiatan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>