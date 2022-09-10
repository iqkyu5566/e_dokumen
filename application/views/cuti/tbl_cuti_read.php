
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_CUTI</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama</td>
				<td><?php echo $nama; ?></td>
			</tr>
	
			<tr>
				<td>Nomor Surat</td>
				<td><?php echo $nomor_surat; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Surat</td>
				<td><?php echo $tgl_surat; ?></td>
			</tr>
	
			<tr>
				<td>Jenis Cuti</td>
				<td><?php echo $jenis_cuti; ?></td>
			</tr>
	
			<tr>
				<td>Lama Cuti</td>
				<td><?php echo $lama_cuti; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Cuti</td>
				<td><?php echo $tgl_cuti; ?></td>
			</tr>

			<tr>
				<td>Nama File</td>
				<!-- <td><?php echo $nama_file; ?></td> -->
				<td><?php echo anchor(site_url('assets/file_cuti/'.$nama_file),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm", target="_blank"'); ?></td>
			</tr>
	
			<tr>
				<td>Keterangan</td>
				<td><?php echo $keterangan; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('cuti') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>