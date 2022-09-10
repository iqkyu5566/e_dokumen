<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_spm_belanja_modal List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Spm</th>
		<th>Tgl Spm</th>
		<th>Nilai Spm</th>
		<th>Nama File</th>
		
            </tr><?php
            foreach ($spm_belanja_modal_data as $spm_belanja_modal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $spm_belanja_modal->no_spm ?></td>
		      <td><?php echo $spm_belanja_modal->tgl_spm ?></td>
		      <td><?php echo $spm_belanja_modal->nilai_spm ?></td>
		      <td><?php echo $spm_belanja_modal->nama_file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>