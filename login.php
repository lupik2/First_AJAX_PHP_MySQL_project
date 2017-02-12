<?php include 'header.php' ?>		
	<div id="wrapper"> 
	<!--TRZYMA CALA STRONE poza menu i logo-->
			<?php
				include 'db_connect.php';	
					
				if(isset($_SESSION['login_status']))
				{
						//unset($_SESSION['login_status']);
						session_destroy();
						echo '<span class="error">Zostałeś wylogowany.</span>';
				}
				
				else{
					
					echo '<form class="city_form" action="login.php" method="post">';
					echo '<input name="login" placeholder="Login" type="text" />';
					echo '<input name="pass" placeholder="Password" type="text" />';
					echo '<button name="submit" type="submit">Zaloguj</button>';
					echo '</form">';					
					
					// przechwyt i porównanie danych					
					if($result = $mysqli->query("SELECT * FROM admin ORDER BY id")){
						$rows = $result->fetch_assoc();
					} else{
						echo "Błąd: Problem z zapytaniem";
					}
					
					if(isset($_POST['submit'])){
						if( $_POST['login'] == $rows['login'] && $_POST['pass'] == $rows['pass'] ){
							$_SESSION['login_status'] = true;
							header('Location: index.php');
						}
						else{
							echo '<span class="error">Error: Złe dane logowania.</span>';
						}
					}
				}


					
			?>

		
	<!-- WRAPPER KONIEC-->
	</div>
<?php include 'footer.php' ?>