<?php include 'assests/header.php'; ?>

<div style="width: 50%;">
	<table class="table table-striped" style="text-align:center;">
		<a href="?op=collectCreateMenuItem">
			<button>Drank aanmaken</button>
		</a>
		<thead>
			<th scope="col">MenuItemCode:</th>
			<th scope="col">Drank naam:</th>
			<th scope="col">prijs:</th>
			<th scope="col">subGerechtCode:</th>
		</thead>

		<?php foreach ($menuItem as $r) {

			echo "<tr>
			<td>".$r['menuItemCode'] ."</td>
			<td>".$r['menuItemNaam']."</td>
			<td>".$r['prijs']."</td>
			<td>".$r['subGerechtCode']."</td>
			<td><a href='?op=readMenuItem&menuItemCode=".$r['menuItemCode']."'>aanpassen</a></td>
			<td><a href='?op=deleteMenuItem&menuItemCode=".$r['menuItemCode']."'>Verwijderen</a></td><br>
			</tr>";
		} ?>
	</table>
</div>
<?php include 'assests/footer.php'; ?>