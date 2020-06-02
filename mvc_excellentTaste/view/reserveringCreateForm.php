<?php include 'assests/header.php'; ?>

<body>
	<div style="width: 25%; margin: auto;">
		<form action="" method="POST">
			<label for="klantnaam">Bestaande klant:</label>
			<select name="klantnaam">
				<?php
					echo "<option></option>";
				foreach ($klant as $k) {
					echo "<option value='".$k['Klantnamen']."'>".$k['Klantnamen']."</option>";
				}
				echo "</select><br>";
			?>

			<label for="klantnaam">Nieuwe klant:</label>
			<input type="text" class="form-control" name="klantnaam" ><br>

			<label for="tafel">tafel:</label>
			<input type="number" class="form-control" name="tafel"><br>

			<label for="datum">datum:</label>
			<input type="date" class="form-control" name="datum"><br>

			<label for="tijd">tijd:</label>
			<input type="time" class="form-control" name="tijd"><br>

			<label for="aantal_k">aantal volwassen:</label>
			<input type="number" class="form-control" name="aantal_v"><br>

			<label for="aantal_k">aantal kinderen:</label>
			<input type="number" class="form-control" name="aantal_k"><br>

			<label for="BOOLEAN">status:</label>
			<input type="BOOLEAN" class="form-control" name="BOOLEAN"><br>

			<input type="submit" name="reserveringFormSubmit" value="verzenden">
			<a href="?op=readsReserveringen">
				<input type="button" value="terug" style="color: black;">
			</a>
		</form>
	</div>
</body>

<?php include 'assests/footer.php';?>