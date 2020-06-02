<?php include 'assests/header.php'; ?>

<body>
	<div style="width: 25%; margin: auto;">
		<form action="?op=createMenuItem" method="POST" style="margin: 20px;">
			
				<label for="menuitemnaam">naam van item</label>
				<input name="menuitemnaam" type="text" class="form-control">

				<label for="menuitemcode">menuitem code</label>
				<input name="menuitemcode" type="text" class="form-control">

				<label for="prijs">prijs</label>
				<input name="prijs" type="text" class="form-control">
				
				<label for="subgerechtcode">subgerecht code</label>
				<select name="subgerechtcode" class="form-control">
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

	<?php include 'assests/footer.php';?>