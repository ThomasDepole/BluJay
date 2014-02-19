<?php

function clientlog($message, $plain = false){

	if($plain == false){
		echo '<script> console.log("BluJay: '.$message.'"); </script>';
	}else{
		echo '<script> console.log("'.$message.'"); </script>';
	}
}

Kint::dump($GLOBALS, $_SERVER, $_GET, $_POST);

?>