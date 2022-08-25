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
        <h2>Tbl_kepskhakim List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor Sk</th>
		<th>Tanggal Sk</th>
		<th>Perihal</th>
		<th>Keterangan</th>
        <th>Nama File</th>
		
            </tr><?php
            foreach ($kepskhakim_data as $kepskhakim)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kepskhakim->nomor_sk ?></td>
		      <td><?php echo $kepskhakim->tanggal_sk ?></td>
		      <td><?php echo $kepskhakim->perihal ?></td>
		      <td><?php echo $kepskhakim->keterangan ?></td>
              <td><?php echo $kepskhakim->nama_file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>