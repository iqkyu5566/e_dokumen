<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_BAPERJAKAT</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	    
					<tr>
						<td width='200'>Nama <?php echo form_error('nama') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama" id="nama" placeholder="Nama"><?php echo $nama; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Nomor Surat <?php echo form_error('nomor_surat') ?></td><td><input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" value="<?php echo $nomor_surat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Surat <?php echo form_error('tgl_surat') ?></td>
						<td><input type="date" class="form-control" name="tgl_surat" id="tgl_surat" placeholder="Tgl Surat" value="<?php echo $tgl_surat; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Satker <?php echo form_error('satker') ?></td>
						<td> <textarea class="form-control" rows="3" name="satker" id="satker" placeholder="Satker"><?php echo $satker; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Jab Lama <?php echo form_error('jab_lama') ?></td>
						<td> <textarea class="form-control" rows="3" name="jab_lama" id="jab_lama" placeholder="Jab Lama"><?php echo $jab_lama; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Jab Baru <?php echo form_error('jab_baru') ?></td>
						<td> <textarea class="form-control" rows="3" name="jab_baru" id="jab_baru" placeholder="Jab Baru"><?php echo $jab_baru; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
						<td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_baperjakat" value="<?php echo $id_baperjakat; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('baperjakat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>