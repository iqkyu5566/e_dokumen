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
        <h2>Tbl_reformempat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Dokumen</th>
		<th>Judul</th>
		<th>Tgl Upload</th>
		<th>Id Kategori</th>
		<th>Nama File</th>
		
            </tr><?php
            foreach ($reformempat_data as $reformempat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $reformempat->no_dokumen ?></td>
		      <td><?php echo $reformempat->judul ?></td>
		      <td><?php echo $reformempat->tgl_upload ?></td>
		      <td><?php echo $reformempat->id_kategori ?></td>
		      <td><?php echo $reformempat->nama_file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>