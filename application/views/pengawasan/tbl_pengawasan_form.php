<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_PENGAWASAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>No Dokumen <?php echo form_error('no_dokumen') ?></td><td><input type="text" class="form-control" name="no_dokumen" id="no_dokumen" placeholder="No Dokumen" value="<?php echo $no_dokumen; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Satker <?php echo form_error('satker') ?></td>
						<td> <textarea class="form-control" rows="3" name="satker" id="satker" placeholder="Satker"><?php echo $satker; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Tim <?php echo form_error('tim') ?></td>
						<td> <textarea class="form-control" rows="3" name="tim" id="tim" placeholder="Tim"><?php echo $tim; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Upload <?php echo form_error('tgl_upload') ?></td>
						<td><input type="date" class="form-control" name="tgl_upload" id="tgl_upload" placeholder="Tgl Upload" value="<?php echo $tgl_upload; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Nama File <?php echo form_error('nama_file') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_file" id="nama_file" placeholder="Nama File"><?php echo $nama_file; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_pengawasan" value="<?php echo $id_pengawasan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pengawasan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>