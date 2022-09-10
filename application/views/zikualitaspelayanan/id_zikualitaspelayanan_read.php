
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA ID_ZIKUALITASPELAYANAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>No Dokumen</td>
				<td><?php echo $no_dokumen; ?></td>
			</tr>
	
			<tr>
				<td>Judul</td>
				<td><?php echo $judul; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Upload</td>
				<td><?php echo $tgl_upload; ?></td>
			</tr>
	
			<tr>
				<td>Id Kategori</td>
				<td><?php echo $id_kategori; ?></td>
			</tr>
	
			<tr>
				<td>Nama File</td>
				<td><?php echo anchor(site_url('assets/file_zikualitaspelayanan/'.$nama_file),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm", target="_blank"');  ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('zikualitaspelayanan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>