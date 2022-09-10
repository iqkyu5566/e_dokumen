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
        <h2>Tbl_pelaporan_dipa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis Laporan</th>
		<th>Jenis Dipa</th>
		<th>Keterangan</th>
		<th>Nama File</th>
		
            </tr><?php
            foreach ($pelaporan_dipa_data as $pelaporan_dipa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pelaporan_dipa->jenis_laporan ?></td>
		      <td><?php echo $pelaporan_dipa->jenis_dipa ?></td>
		      <td><?php echo $pelaporan_dipa->keterangan ?></td>
		      <td><?php echo $pelaporan_dipa->nama_file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>