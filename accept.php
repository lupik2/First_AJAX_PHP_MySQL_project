<?php
	include 'db_connect.php';
	include 'function.php';
	$cityID = $_GET['id'];
	if( isset($cityID) && is_numeric($cityID) ){
	

		if($zm1 = $mysqli->query("SELECT * FROM cities WHERE id=$cityID")){
			$cityinfo = array('id', 'nazwa', 'opis', 'obrazek');
			$row= $zm1 -> fetch_assoc();
				foreach($row as $key => $value){
						while($cityinfo){
							$cityinfo[$key] = $value;
							break;
						}
				}
				
				$src = "dane.xml";
				$xml = simplexml_load_file($src);
				//foreach($xml->info as $city){
				//	$elCount =	(string) $city['id'];
				//}

				$lastID = CheckElementsCount("dane.xml", true)+1;
				
				$newcity = $xml->addChild('info');
				$newcity->addAttribute('id',  $lastID);
				$newcity->addChild('name', $cityinfo['nazwa']);
				$newcity->addChild('desc', $cityinfo['opis']);
				$newcity->addChild('link', $cityinfo['obrazek']);
				
				file_put_contents($src , $xml->asXML());
	
				if($zm1 = $mysqli->prepare("DELETE FROM cities WHERE id = ? LIMIT 1")){
					$zm1 -> bind_param("i",$_GET['id']);
					$zm1 -> execute();			
					$zm1 -> close();
					
				} else{
					echo "Błąd: Problem z zapytaniem";
				}
	
				header("Location: wait.php");

			
		} else{
			echo "Błąd: Problem z zapytaniem";
		}
		
		
		//$mysqli->close();
		
		//header("Location: wait.php");
		//echo "Usunieto";
		
	
	} else {		
		echo "Błąd: Błąd Argumentu";
	}
?>