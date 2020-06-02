<?php include 'assests/header.php'; ?>

<body>
	<div style="width: 25%; margin: auto;">
		<form action="" method="POST">
			<label for="naam">naam:</label>
			<input type="text" class="form-control" name="naam"><br>

			<label for="telnr">Telefoonnummer:</label>
			<input type="tel" class="form-control" name="telnr"><br>

			<label for="Email">Email:</label>
			<input type="Email" class="form-control" name="Email"><br>

			<label for="BOOLEAN">Status:</label>
			<input type="BOOLEAN" class="form-control" name="BOOLEAN"><br>	

			<input type="submit" name="klantenFormSubmit" value="Opslaan">
			<a href="?op=readsKlanten">
				<input type="button" value="terug" style="color: black;">
			</a>
		</form>
	</div>
</body>

<?php include 'assests/footer.php';?>