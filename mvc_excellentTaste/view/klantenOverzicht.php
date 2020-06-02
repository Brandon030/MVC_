<?php include 'assests/header.php'; ?>

<div class="container" style="width: 50%;">	
	<table class="table table-striped" style="text-align:center;">

		<thead>
			<th scope="col">klanten_id</th>
			<th scope="col">klant namen</th>
			<th scope="col">Telefoon</th>
			<th scope="col">Email</th>
			<th scope="col">status</th>
			<th scope="col"></th>
			<th scope="col"><a href="?op=collectCreateKlant"><h4>+</h4></a></th>
		</thead>
		<tbody>
			<?php foreach ($results as $r) {

				echo "<tr>
				<td>".$r['Klant_id'] ."</td>
				<td>".$r['Klantnamen']."</td>
				<td>".$r['Telefoon']."</td>
				<td>".$r['Email']."</td>
				<td>".$r['status']."</td>
				<td><a href='?op=readKlant&Klant_id=".$r['Klant_id']."'>Bekijken</a></td>
				<td><a href='?op=deleteKlant&Klant_id=".$r['Klant_id']."'>Verwijderen</a></td>
				</tr>";
			} ?>
		</tbody>
	</table>
</div>
<?php include 'assests/footer.php'; ?>