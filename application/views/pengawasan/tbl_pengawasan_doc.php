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
        <h2>Tbl_pengawasan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Dokumen</th>
		<th>Satker</th>
		<th>Tim</th>
		<th>Tgl Upload</th>
		<th>Nama File</th>
		
            </tr><?php
            foreach ($pengawasan_data as $pengawasan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengawasan->no_dokumen ?></td>
		      <td><?php echo $pengawasan->satker ?></td>
		      <td><?php echo $pengawasan->tim ?></td>
		      <td><?php echo $pengawasan->tgl_upload ?></td>
		      <td><?php echo $pengawasan->nama_file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>