<?php include 'assests/header.php'; ?>

<body>
	<div style="width: 25%; margin: auto;">
		<form action="?op=updateMenuItem&menuItemCode=<?=$item['menuItemCode']?>" method="POST" style="margin: 20px;">

					<label for="menuitemnaam">Naam menu item</label>
					<input name="menuitemnaam" type="text" class="form-control" value="<?= $item['menuItemNaam'] ?>">
				
					<label for="menuitemcode">menuitem code</label>
					<input name="menuitemcode" type="text" class="form-control" value="<?= $item['menuItemCode'] ?>">
				
					<label for="prijs">prijs</label>
					<input name="prijs" type="text" class="form-control" value="<?= $item['prijs']?>"><br>

					<label for="subgerechtcode">subgerecht code</label>
					<select name="subgerechtcode" value="<?= $item['subGerechtCode'] ?>" class="form-control">
						<option value="alho">bier</option>
						<option value="frdr">frisdrank</option>
						<option value="wadr">warm drinken</option>
				      	<!-- <option value="voge">voorgerecht</option>
				      	<option value="hoge">hoofdgerecht</option>
				      	<option value="nage">nagerecht</option> -->
				      </select>
		</form>
			<input type="submit" name="form-submitted" value="versturen">
				  <a href="?op=readsMenuDranken">
				  	<input type="button" value="terug" style="color: black;">
				  </a>
	</div>
</body>

<?php include 'assests/footer.php'; ?>