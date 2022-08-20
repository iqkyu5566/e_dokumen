<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_HUKDIS</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	    
					<tr>
						<td width='200'>Nama <?php echo form_error('nama') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama" id="nama" placeholder="Nama"><?php echo $nama; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Nomor Sk <?php echo form_error('nomor_sk') ?></td><td><input type="text" class="form-control" name="nomor_sk" id="nomor_sk" placeholder="Nomor Sk" value="<?php echo $nomor_sk; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Sk <?php echo form_error('tgl_sk') ?></td>
						<td><input type="date" class="form-control" name="tgl_sk" id="tgl_sk" placeholder="Tgl Sk" value="<?php echo $tgl_sk; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Jenis Huk <?php echo form_error('jenis_huk') ?></td>
						<td> <textarea class="form-control" rows="3" name="jenis_huk" id="jenis_huk" placeholder="Jenis Huk"><?php echo $jenis_huk; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Sanksi <?php echo form_error('sanksi') ?></td>
						<td> <textarea class="form-control" rows="3" name="sanksi" id="sanksi" placeholder="Sanksi"><?php echo $sanksi; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Tmt Mulai <?php echo form_error('tmt_mulai') ?></td>
						<td> <textarea class="form-control" rows="3" name="tmt_mulai" id="tmt_mulai" placeholder="Tmt Mulai"><?php echo $tmt_mulai; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Tmt Akhir <?php echo form_error('tmt_akhir') ?></td>
						<td> <textarea class="form-control" rows="3" name="tmt_akhir" id="tmt_akhir" placeholder="Tmt Akhir"><?php echo $tmt_akhir; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
						<td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_hukdis" value="<?php echo $id_hukdis; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('hukdis') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>