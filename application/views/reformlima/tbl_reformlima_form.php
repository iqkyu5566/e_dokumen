<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_REFORMLIMA</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>No Dokumen <?php echo form_error('no_dokumen') ?></td><td><input type="text" class="form-control" name="no_dokumen" id="no_dokumen" placeholder="No Dokumen" value="<?php echo $no_dokumen; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Judul <?php echo form_error('judul') ?></td>
						<td> <textarea class="form-control" rows="3" name="judul" id="judul" placeholder="Judul"><?php echo $judul; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Upload <?php echo form_error('tgl_upload') ?></td>
						<td><input type="date" class="form-control" name="tgl_upload" id="tgl_upload" placeholder="Tgl Upload" value="<?php echo $tgl_upload; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Kategori <?php echo form_error('id_kategori') ?></td><td><input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Nama File <?php echo form_error('nama_file') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_file" id="nama_file" placeholder="Nama File"><?php echo $nama_file; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_reformlima" value="<?php echo $id_reformlima; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('reformlima') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>