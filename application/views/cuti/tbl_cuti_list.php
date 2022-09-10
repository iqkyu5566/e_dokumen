<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_CUTI</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('cuti/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('cuti/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('cuti/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('cuti/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('cuti'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Nomor Surat</th>
		<th>Tgl Surat</th>
		<th>Jenis Cuti</th>
		<th>Lama Cuti</th>
		<th>Tgl Cuti</th>
		<th>Keterangan</th>
        <th>Nama File</th>
		<th>Action</th>
            </tr><?php
            foreach ($cuti_data as $cuti)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $cuti->nama ?></td>
			<td><?php echo $cuti->nomor_surat ?></td>
			<td><?php echo $cuti->tgl_surat ?></td>
			<td><?php echo $cuti->jenis_cuti ?></td>
			<td><?php echo $cuti->lama_cuti ?></td>
			<td><?php echo $cuti->tgl_cuti ?></td>
            <td><?php echo anchor(site_url('assets/file_cuti/'.$cuti->nama_file),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm", target="_blank"'); ?></td>
			<td><?php echo $cuti->keterangan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('cuti/read/'.$cuti->id_cuti),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('cuti/update/'.$cuti->id_cuti),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('cuti/delete/'.$cuti->id_cuti),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>