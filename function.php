<?php

		@session_start();
			function CheckElementsCount($src_file, $zm1){		
			$xml = simplexml_load_file($src_file);
			
			foreach($xml->info as $city){
				$elCount =	(string) $city['id'];
				
				if(!$zm1){break; return $elCount;}
			}
				//$_SESSION['lastID'] = $elCount;
				return $elCount;
			
			session_destroy();
		}