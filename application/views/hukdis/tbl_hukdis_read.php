
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_HUKDIS</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
	
			<tr>
				<td>Nomor Sk</td>
				<td><?php echo $nomor_sk; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Sk</td>
				<td><?php echo $tgl_sk; ?></td>
			</tr>
	
			<tr>
				<td>Jenis Huk</td>
				<td><?php echo $jenis_huk; ?></td>
			</tr>
	
			<tr>
				<td>Sanksi</td>
				<td><?php echo $sanksi; ?></td>
			</tr>
	
			<tr>
				<td>Tmt Mulai</td>
				<td><?php echo $tmt_mulai; ?></td>
			</tr>
	
			<tr>
				<td>Tmt Akhir</td>
				<td><?php echo $tmt_akhir; ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>

			<tr>
				<td>Nama File</td>
				<td><?php echo anchor(site_url('assets/file_hukdis/'.$nama_file),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm", target="_blank"');  ?></td>
			</tr>
	
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('hukdis') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>