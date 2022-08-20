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
        <h2>Id_skhakim List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor Surat</th>
		<th>Tgl Surat</th>
		<th>Perihal</th>
		<th>Jenis Sk</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($skhakim_data as $skhakim)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $skhakim->nomor_surat ?></td>
		      <td><?php echo $skhakim->tgl_surat ?></td>
		      <td><?php echo $skhakim->perihal ?></td>
		      <td><?php echo $skhakim->jenis_sk ?></td>
		      <td><?php echo $skhakim->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>