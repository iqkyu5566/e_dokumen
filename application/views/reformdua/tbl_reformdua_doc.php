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
        <h2>Tbl_reformdua List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Dokumen</th>
		<th>Judul</th>
		<th>Tgl Upload</th>
		<th>Id Kategori</th>
		<th>Nama File</th>
		
            </tr><?php
            foreach ($reformdua_data as $reformdua)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $reformdua->no_dokumen ?></td>
		      <td><?php echo $reformdua->judul ?></td>
		      <td><?php echo $reformdua->tgl_upload ?></td>
		      <td><?php echo $reformdua->id_kategori ?></td>
		      <td><?php echo $reformdua->nama_file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>