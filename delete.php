<?php
	include 'db_connect.php';
	
	if( isset($_GET['id']) && is_numeric($_GET['id']) ){
	
		
		if($zm1 = $mysqli->prepare("DELETE FROM cities WHERE id = ? LIMIT 1")){
			$zm1 -> bind_param("i",$_GET['id']);
			$zm1 -> execute();			
			$zm1 -> close();
			
		} else{
			echo "Błąd: Problem z zapytaniem";
		}
		
		
		$mysqli->close();
		
		header("Location: wait.php");
		echo "Usunieto";
		
	
	} else {		
		echo "Błąd: Błąd Argumentu";
	}
?>