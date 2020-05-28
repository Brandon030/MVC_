<?php include 'assests/header.php'; ?>

<div style="width: 50%;">
	<table class="table table-striped" style="text-align:center;">
		<a href="?op=createKlant">
			<button>Klant aanmaken</button>
		</a>
		<thead>
			<th scope="col">klanten_id</th>
			<th scope="col">klant namen</th>
			<th scope="col">Telefoon</th>
			<th scope="col">Email</th>
			<th scope="col">status</th>
		</thead>

		<?php foreach ($results as $r) {

			echo "<tr>
			<td>".$r['Klant_id'] ."</td>
			<td>".$r['Klantnamen']."</td>
			<td>".$r['Telefoon']."</td>
			<td>".$r['Email']."</td>
			<td>".$r['status']."</td>
			<td><a href='?op=readKlant&Klant_id=".$r['Klant_id']."'>Bekijken</a></td>
			<td><a href='?op=deleteKlant&Klant_id=".$r['Klant_id']."'>Verwijderen</a></td><br>
			</tr>";
		} ?>
	</table>
</div>
<?php include 'assests/footer.php'; ?>