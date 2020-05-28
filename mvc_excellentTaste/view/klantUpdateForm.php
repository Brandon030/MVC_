<?php include 'assests/header.php'; ?>

<body>
	<form action="?op=updateKlant&Klant_id=<?=$klant['Klant_id']?>" method="POST">
		<label for="naam">naam:</label>
		<input type="text" class="form-control" name="naam" value="<?= $klant['Klantnamen'] ?>"><br>

		<label for="telnr">Telefoonnummer:</label>
		<input type="tel" class="form-control" name="telnr" value="<?= $klant['Telefoon'] ?>"><br>

		<label for="Email">Email:</label>
		<input type="Email" class="form-control" name="Email" value="<?= $klant['Email'] ?>"><br>

		<label for="BOOLEAN">Status:</label>
		<input type="BOOLEAN" class="form-control" name="BOOLEAN" value="<?= $klant['status'] ?>"><br>	

		<input type="submit" name="formSubmit" value="verzenden">
		<a href="?op=readsKlanten">
			<input type="button" value="terug" style="color: black;">
		</a>
	</form>

</body>

<?php include 'assests/footer.php';?>