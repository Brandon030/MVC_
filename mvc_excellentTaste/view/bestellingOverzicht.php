<?php include 'assests/header.php'; ?>


<div class="contentblocks">
	<table class="table table-striped" style="text-align:center; float: left; width: 48%;">

		<th scope="col">productnaam</th>
		<th scope="col">aantal</th>
		<th scope="col">prijs</th>
		<th scope="col"></th>

		<?php
		foreach ($results as $k) {
			echo "<tr>
			<td>".$k['menuNaam'] ."</td>
			<td>". $k['aantal']."</td>
			<td>".$k['bestelPrijs']."</td>
			<td><a href='?op=deleteBestelling&id=".$k['bestelling_id']."'><button>verwijder</button></a></td>
			</tr>";
		}

		?>
	</table>
</div>

<div class="contentblocks">
	<table class="table table-striped" style="text-align:center; float:right; width: 48%;">
		<th scope="col">menuitemcode</th>
		<th scope="col">menunaam</th>
		<th scope="col">prijs</th>
		<th scope="col"></th>

		<?php
		foreach ($results2 as $r) {
			echo "<tr>
			<td>".$r['menuItemCode'] ."</td>
			<td><a href='?op=createBestelling&reservering_id=".$k['reservering_id']."&menuItemCode=".$r['menuItemCode']."'><span style='border: 4px dotted;'>".$r['menuItemNaam']."</span></a></td>
			<td>".$r['prijs']."</td>
			</tr>";
		}

		?>
	</table>
</div>


<?php include 'assests/footer.php'; ?>

<!-- <td><a href='?op=updateBestelling&id=".$_REQUEST['id']."&mic=".$k['menuitemcode']."&tid=2&mp=".$k['menuprijs']."'>". $k['menunaam']."</a></td> -->