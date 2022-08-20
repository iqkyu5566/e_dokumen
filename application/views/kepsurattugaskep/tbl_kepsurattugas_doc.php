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
        <h2>Tbl_kepsurattugas List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor St</th>
		<th>Tanggal St</th>
		<th>Perihal</th>
		<th>Nama</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($kepsurattugaskep_data as $kepsurattugaskep)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kepsurattugaskep->nomor_st ?></td>
		      <td><?php echo $kepsurattugaskep->tanggal_st ?></td>
		      <td><?php echo $kepsurattugaskep->perihal ?></td>
		      <td><?php echo $kepsurattugaskep->nama ?></td>
		      <td><?php echo $kepsurattugaskep->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>