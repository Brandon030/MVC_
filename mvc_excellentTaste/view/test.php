<?php include 'assests/header.php'; ?>

<div style="width: 50%; margin: auto;">
	<table class="table table-striped" style="text-align:center;">
		<thead>
			<th scope="col">Nummer:</th>
			<th scope="col"></th>
		</thead>

		<?php foreach ($result as $r) {
			echo "<tr>
			<td>".$r['nummer'] ."</td>
			<td><a href='?op=updatePlus&nummer=".$r['nummer']."'><h4>+</h4></a></td>
			<td><a href='?op=updateMin&nummer=".$r['nummer']."'><h4>-</h4></a></td>
			</tr>";
		} ?>
	</table>
</div>
<?php include 'assests/footer.php'; ?>