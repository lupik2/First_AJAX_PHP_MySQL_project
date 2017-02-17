<?php include 'header.php' ?>
	<div id="wrapper"> 
	<!--TRZYMA CALA STRONE poza menu i logo-->
	
		<div class="cities">
			<div id="cityinfo" class="hidden"></div>
			<span class="hideinfo hidden">Schowaj informacje.</span>
			<div class="clear_both"></div>

		<?php
			include 'function.php';
			$xml = simplexml_load_file("dane.xml");
			 			
			$allIDS = array();
			foreach($xml->info as $info){
				if(!isset($varrr)){$varrr = 1;}
				$allIDS[$varrr] =  $info->attributes();
				$varrr++;
			}
			
			for($i=0;$i<=count($allIDS)-1; $i++)
			{				
				$data_id= $xml->info[$i]->attributes();
				$name= $xml->info[$i]->name;
				$img= $xml->info[$i]->link;
				echo '<div class="city" data-id="'. $data_id.'">';
					echo '<span class="cityname">' . $name .'</span>';
					echo '<img src="'.$img.'"/>';
				echo'</div>';
			}
			
		?>

		<div class="clear_both"></div>
		</div>
	<!-- WRAPPER KONIEC-->
	</div>
<?php include 'footer.php' ?>

