<body>
	<form action="?op=createMenuItem" method="POST" style="margin: 20px;">
	  <div class="form-row">
	    
	    <div class="form-group col-md-2">
	      <label for="menuitemnaam">naam van item</label>
	      <input name="menuitemnaam" type="text" class="form-control">
	    </div>

	    <div class="form-group col-md-2">
	      <label for="menuitemcode">menuitem code</label>
	      <input name="menuitemcode" type="text" class="form-control">
	    </div>

	  <div class="form-group">
	    <label for="prijs">prijs</label>
	    <input name="prijs" type="text" class="form-control">
	  </div>

	  <div class="form-group col-md-6">
	      <label for="subgerechtcode">subgerecht code</label>
	      <select name="subgerechtcode">
	      	<option value="alho">bier</option>
	      	<option value="frdr">frisdrank</option>
	      	<option value="wadr">warm drinken</option>
	      	<!-- <option value="voge">voorgerecht</option>
	      	<option value="hoge">hoofdgerecht</option>
	      	<option value="nage">nagerecht</option> -->
	      </select>
	    </div>

	  <input type="submit" name="form-submitted">
	</form>
</body>