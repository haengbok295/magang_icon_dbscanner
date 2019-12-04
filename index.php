<html>
	<head>    
    	<title>DB SCANNER</title>

    	<style>
			table, th, td {
			  border: 1px solid black;
			  border-collapse: collapse;
			}
			th {
				text-align: center;
			}
		</style>
	</head>

   <body>

      <center>
      <h2>SCANNER DATABASE PERPUSTAKAAN</h2>
      <h5>Silakan pilih tabel yang akan di scan</h5>
	  </center>

      <?php 
		require_once('dbscanner.php');
		require_once('dsTable.php');
		require_once('dsField.php');
     
      $new = new dbscanner();

      $p = $new->scanMySQL("localhost","root","","sakila");
      
      $jmlTable = $new->Tables()->getCount();
      // $jmlField0 = $new->Tables()->getTable('buku')->Fields()->getCount();
      // $jmlField1 = $new->Tables()->getTable('peminjaman')->Fields()->getCount();
      // $jmlField2 = $new->Tables()->getTable('pengunjung')->Fields()->getCount();

      // $fields0 = $new->Tables()->getTable('buku')->Fields();
      // $fields1 = $new->Tables()->getTable('peminjaman')->Fields();
      // $fields2 = $new->Tables()->getTable('pengunjung')->Fields();

      $tabel = $new->Tables()->getTable('buku');
      $tabels = $new->Tables()->getTables();
      $field = $new->Tables()->getTable('buku')->Fields()->getField('judul');

      // print ($jmlTable);
      // print ($jmlField);
      // print_r ($tabel);
      // print_r ($tabels[1]);
      // print_r ($field);
      // print_r ($fields);
	?>

	<center>
		<p>Jumlah tabel : <?php echo $jmlTable ?></p>
	    <form method="post" name="form">
		  <select name="nama_tabel">
		    <option value="">Select Table</option>
		    <?php for ($i=0; $i < $jmlTable ; $i++) { ?>
		    	<option value="<?php echo $tabels[$i] ?>"><?php echo $tabels[$i] ?></option>
		    <?php } ?>
		  </select>
		  <input type="submit" name="submit">
		</form>

		<?php 
		if (isset($_POST['submit'])) {
			if(isset($_POST['nama_tabel']))
			// 	echo "You have selected :" .$_POST['nama_tabel'];
			// }
			{
			foreach ($tabels as $key => $value) {
				if($_POST['nama_tabel']==$value){
		?>
				<p>Field pada tabel <?php echo $value ?> </p>

				<table style="width: 40%">
					<thead>
						<tr>
							<b>
							<th>Field Name</th>
							<th>Data Type</th>
							<th>Data Length</th>
							<th>Primary Key</th>
							<th>Allow Null</th>
							</b>
						</tr>
					</thead>
					<tbody>
						<?php for ($i=0; $i < ($new->Tables()->getTable($value)->Fields()->getCount()) ; $i++) { ?>
						
						<tr>
							<td><?php echo $new->Tables()->getTable($value)->Fields()->getItem($i)->getFieldName() ?></td>
							<td><?php echo $new->Tables()->getTable($value)->Fields()->getItem($i)->getDataType() ?></td>
							<td><?php echo $new->Tables()->getTable($value)->Fields()->getItem($i)->getDataLength() ?></td>
							<td><?php echo $new->Tables()->getTable($value)->Fields()->getItem($i)->getisPK() ?></td>
							<td><?php echo $new->Tables()->getTable($value)->Fields()->getItem($i)->getIsAllowNull() ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
		<?php
			}
				}
			}
		}
		?>
	</center>
   </body>
</html>