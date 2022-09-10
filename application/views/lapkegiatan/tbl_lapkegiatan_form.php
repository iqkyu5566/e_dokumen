<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_LAPKEGIATAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			
				<table class='table table-bordered'>
	    
					<tr>
						<td width='200'>Nama Kegiatan <?php echo form_error('nama_kegiatan') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_kegiatan" id="nama_kegiatan" placeholder="Nama Kegiatan"><?php echo $nama_kegiatan; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Pelaksanaan <?php echo form_error('tgl_pelaksanaan') ?></td>
						<td><input type="date" class="form-control" name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="Tgl Pelaksanaan" value="<?php echo $tgl_pelaksanaan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
						<td><input type="date" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
					</tr>

					<tr>
						<!-- <td width='200'>Nama File <?php echo form_error('nama_file') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_file" id="nama_file" placeholder="Nama File"><?php echo $nama_file; ?></textarea></td> -->
						<td width='200'>
						<div class="form-group">
						<label for="nama_file">Nama File</label>
						</td>
						<td>
						<div class="input-group">
						<div class="custom-file">
						<input type="file" class="custom-file-input" id="nama_file" name="nama_file">
						</div>
						
						</div>
						</div>
						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_lapkegiatan" value="<?php echo $id_lapkegiatan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('lapkegiatan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>