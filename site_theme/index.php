<?php


?>
<h2>test</h2>

<form method="post">
	<input type="text" name="firstname"  value="<?php echo $firstname; ?>" /> 
	<br />
	<input type="text" <?php FormHelpers_Name("text", "djdj"); ?>  />
	<br />
	<button type="submit">GO</button>
</form>


