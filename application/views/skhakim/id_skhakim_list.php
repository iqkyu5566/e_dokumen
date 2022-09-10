<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA ID_SKHAKIM</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('skhakim/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('skhakim/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('skhakim/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('skhakim/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('skhakim'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nomor SK</th>
		<th>Tgl SK</th>
		<th>Perihal</th>
		<th>Sk Kehususan</th>
		<th>Keterangan</th>
		<th>Action</th>
            </tr><?php
            foreach ($skhakim_data as $skhakim)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $skhakim->nomor_surat ?></td>
			<td><?php echo $skhakim->tgl_surat ?></td>
			<td><?php echo $skhakim->perihal ?></td>
			<td><?php echo $skhakim->jenis_sk ?></td>
			<td><?php echo $skhakim->keterangan ?></td>
            <td><?php echo anchor(site_url('assets/file_skhakimkhusus/'.$skhakim->nama_file),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm", target="_blank"');  ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('skhakim/read/'.$skhakim->id_skhakim),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('skhakim/update/'.$skhakim->id_skhakim),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('skhakim/delete/'.$skhakim->id_skhakim),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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