<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_PELAPORAN_DIPA</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	    
					<tr>
						<td width='200'>Jenis Laporan <?php echo form_error('jenis_laporan') ?></td>
						<td> <textarea class="form-control" rows="3" name="jenis_laporan" id="jenis_laporan" placeholder="Jenis Laporan"><?php echo $jenis_laporan; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Jenis Dipa <?php echo form_error('jenis_dipa') ?></td>
						<td> <textarea class="form-control" rows="3" name="jenis_dipa" id="jenis_dipa" placeholder="Jenis Dipa"><?php echo $jenis_dipa; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
						<td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Nama File <?php echo form_error('nama_file') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_file" id="nama_file" placeholder="Nama File"><?php echo $nama_file; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_pelaporan" value="<?php echo $id_pelaporan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pelaporan_dipa') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>