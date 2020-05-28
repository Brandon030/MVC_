
<p>Wilt u een nieuw klant aanmaken?
	<input type="radio" name="ja" id="ja">ja
	<input type="radio" name="nee"id="nee">nee
</p>

<script>
	var naamJa = document.getElementById("ja");
	var naamNee = document.getElementById("nee");
	
	if(neemJa.checked === true){
		
	}
</script>>

<?php if(){
	echo "<option placeholder='vul hier de nieuwe klant naam in'>Nieuwe klant naam:</option>";
} else{?>
	<label for="klantnaam">Bestaande klant:</label>
	<select name="klantnaam">
		<?php
		foreach ($klant as $k) {
			echo "<option value='".$k['Klantnamen']."'>".$k['Klantnamen']."</option>";
		}
		echo "</select><br>";
	}
	?>
}