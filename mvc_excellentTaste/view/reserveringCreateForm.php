<?php include 'assests/header.php'; ?>

<body>
	<form action="" method="POST">
		<label for="klantnaam">Klant:</label>
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

		<input type="submit" name="formSubmit" value="verzenden">
		<a href="?op=readsReserveringen">
			<input type="button" value="terug" style="color: black;">
		</a>
	</form>

</body>

<?php include 'assests/footer.php';?>