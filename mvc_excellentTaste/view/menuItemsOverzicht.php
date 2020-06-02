<?php include 'assests/header.php'; ?>

<div style="width: 50%; margin: auto;">
	<table class="table table-striped" style="text-align:center;">
		<thead>
			<th scope="col">MenuItemCode:</th>
			<th scope="col">Drank naam:</th>
			<th scope="col">prijs:</th>
			<th scope="col">subGerechtCode:</th>
			<th scope="col"></th>
			<th scope="col"><a href="?op=collectCreateMenuItem"><h4>+</h4></a></th>
		</thead>

		<?php foreach ($menuItem as $r) {

			echo "<tr>
			<td>".$r['menuItemCode'] ."</td>
			<td>".$r['menuItemNaam']."</td>
			<td>".$r['prijs']."</td>
			<td>".$r['subGerechtCode']."</td>
			<td><a href='?op=readMenuItem&menuItemCode=".$r['menuItemCode']."'>aanpassen</a></td>
			<td><a href='?op=deleteMenuItem&menuItemCode=".$r['menuItemCode']."'>Verwijderen</a></td>
			</tr>";
		} ?>
	</table>
</div>
<?php include 'assests/footer.php'; ?>