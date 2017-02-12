<?php include 'header.php' ?>		
	<div id="wrapper"> 
	<!--TRZYMA CALA STRONE poza menu i logo-->
	
			<?php
			
					include 'db_connect.php';	
					//session_start();
					$zm1 = $mysqli->query("SELECT * FROM cities ORDER BY id");
					
					if(!$row = $zm1-> fetch_assoc()){
						echo'<span class="error">Aktualnie nie ma żadnych miast oczekujących na akceptację.</span>';
					}else {						
							echo '<table class="waitcity">';
							echo "<tr>";
							echo "<th>Nazwa</th>";
							echo "<th>Opis</th>";
							echo "<th>Link</th>";
							echo "</tr>";	
							
							while ($row){
								echo "<tr>";
								echo "<td>" . $row['nazwa'] . "</td>";
								echo "<td>" . $row['opis'] . "</td>";
								echo "<td>" . $row['obrazek'] . "</td>";
								if(isset($_SESSION['login_status'])){echo '<td> <a href="delete.php?id=' . $row['id'] .'">USUŃ</a></td>';}
								echo "</tr>";
								$row = $zm1-> fetch_assoc();
							}
							
							echo "</table>";
					}

			?>


			
			
		
	<!-- WRAPPER KONIEC-->
	</div>
<?php include 'footer.php' ?>