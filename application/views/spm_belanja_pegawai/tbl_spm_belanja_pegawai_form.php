<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_SPM_BELANJA_PEGAWAI</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>No Spm <?php echo form_error('no_spm') ?></td><td><input type="text" class="form-control" name="no_spm" id="no_spm" placeholder="No Spm" value="<?php echo $no_spm; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Spm <?php echo form_error('tgl_spm') ?></td>
						<td><input type="date" class="form-control" name="tgl_spm" id="tgl_spm" placeholder="Tgl Spm" value="<?php echo $tgl_spm; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Uraian Spm <?php echo form_error('uraian_spm') ?></td>
						<td> <textarea class="form-control" rows="3" name="uraian_spm" id="uraian_spm" placeholder="Uraian Spm"><?php echo $uraian_spm; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Nilai Spm <?php echo form_error('nilai_spm') ?></td>
						<td> <textarea class="form-control" rows="3" name="nilai_spm" id="nilai_spm" placeholder="Nilai Spm"><?php echo $nilai_spm; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Nama File <?php echo form_error('nama_file') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_file" id="nama_file" placeholder="Nama File"><?php echo $nama_file; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_spmbp" value="<?php echo $id_spmbp; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('spm_belanja_pegawai') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>