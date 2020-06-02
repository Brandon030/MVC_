<?php include 'assests/header.php'; ?>

<div style="width: 50%;">
	<table class="table table-striped" style="text-align:center;">
		<a href="?op=collectCreateReservering">
			<button>Reservering aanmaken</button>
		</a>
		<thead>
			<th scope="col">reservering_id:</th>
			<th scope="col">Klantnaam:</th>
			<th scope="col">tafel:</th>
			<th scope="col">datum:</th>
			<th scope="col">tijd:</th>
			<th scope="col">aantal volwassen:</th>
			<th scope="col">aantal kinderen:</th>
			<th scope="col">status:</th>
			<th scope="col">klant_id:</th>
		</thead>

		<?php foreach ($results as $r) {

			echo "<tr>
			<td>".$r['reservering_id'] ."</td>
			<td>".$r['Klantnamen'] ."</td>
			<td><a href='?op=readsBestellingen&reservering_id=".$r['reservering_id']."'><span style='border: 4px dotted;'>".$r['tafel']."</span></a></td>
			<td>".$r['tafel'] ."</td>
			<td>".$r['datum'] ."</td>
			<td>".$r['tijd']."</td>
			<td>".$r['aantal_k']."</td>
			<td>".$r['aantal']."</td>
			<td>".$r['status']."</td>
			<td>".$r['Klant_id'] ."</td>
			<td><a href='?op=readReservering&reservering_id=".$r['reservering_id']."'>Bekijken</a></td>
			<td><a href='?op=deleteReservering&reservering_id=".$r['reservering_id']."'>Verwijderen</a></td><br>
			</tr>";
		} ?>
	</table>
</div>
<?php include 'assests/footer.php'; ?>