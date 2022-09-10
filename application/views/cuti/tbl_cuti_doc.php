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
        <h2>Tbl_cuti List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Nomor Surat</th>
		<th>Tgl Surat</th>
		<th>Jenis Cuti</th>
		<th>Lama Cuti</th>
		<th>Tgl Cuti</th>
        <th>Nama File</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($cuti_data as $cuti)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $cuti->nama ?></td>
		      <td><?php echo $cuti->nomor_surat ?></td>
		      <td><?php echo $cuti->tgl_surat ?></td>
		      <td><?php echo $cuti->jenis_cuti ?></td>
		      <td><?php echo $cuti->lama_cuti ?></td>
		      <td><?php echo $cuti->tgl_cuti ?></td>
              <td><?php echo $cuti->nama_file ?></td>	
		      <td><?php echo $cuti->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>