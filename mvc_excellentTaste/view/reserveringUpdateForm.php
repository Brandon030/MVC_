<?php include 'assests/header.php'; ?>

<body>
	<div style="width: 25%; margin: auto;">
		<form action="?op=updateReservering&reservering_id=<?=$reservering['reservering_id']?>" method="POST">
			<label for="klantnaam">Klantnaam:</label>
			<input type="text" class="form-control" name="klantnaam" value="<?= $reservering['Klantnamen'] ?>"><br>

			<label for="tafel">tafel:</label>
			<input type="number" class="form-control" name="tafel" value="<?= $reservering['tafel'] ?>"><br>

			<label for="datum">datum:</label>
			<input type="date" class="form-control" name="datum" value="<?= $reservering['datum'] ?>"><br>

			<label for="tijd">tijd:</label>
			<input type="time" class="form-control" name="tijd" value="<?= $reservering['tijd'] ?>"><br>

			<label for="aantal_k">aantal volwassen:</label>
			<input type="number" class="form-control" name="aantal_v" value="<?= $reservering['aantal_k'] ?>"><br>

			<label for="aantal_k">aantal kinderen:</label>
			<input type="number" class="form-control" name="aantal_k" value="<?= $reservering['aantal'] ?>"><br>

			<label for="BOOLEAN">status:</label>
			<input type="BOOLEAN" class="form-control" name="BOOLEAN" value="<?= $reservering['status'] ?>"><br>

			<input type="submit" name="formSubmit" value="verzenden">
			<a href="?op=readsReserveringen">
				<input type="button" value="terug" style="color: black;">
			</a>
		</form>
	</div>
</body>

<?php include 'assests/footer.php';?>