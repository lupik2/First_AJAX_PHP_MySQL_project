<?php include 'header.php' ?>		
	<div id="wrapper"> 
	<!--TRZYMA CALA STRONE poza menu i logo-->
	<form class="city_form" method="post" action="addcity.php">
			<?php
					include 'db_connect.php';	
					
					echo '<input name="nazwa" placeholder="Nazwa miasta" type="text">';
					echo '<input name="obrazek" placeholder="Link do obrazka miasta" type="url">';
					echo '<textarea name="opis" placeholder="Opis miasta" rows="10"></textarea>';
					echo '<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id="captchaimg" />';
					echo '<input id="6_letters_code" name="6_letters_code" type="text" placeholder="Enter the code above here"/>';
					echo '<button class="add_button" name="submit" type="submit">Dodaj Miasto</button>';
			?>
	</form>
				
			
			<?php
			
			//session_start();
			
			if($mysqli->connect_error!=0){
				echo "Błąd: Błąd połączenia";
			}else{
				if(isset($_POST['submit'])){
					
					if(empty($_SESSION['6_letters_code'] ) ||
					strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
					{
	
					echo '<span class="error">Błąd: Zły kod captcha</span>';
					
					@$errors .= "n The captcha code does not match!";
					}
					
					if(empty($errors))
					{
						if(isset($_POST['nazwa']) == '' || $_POST['obrazek'] == '' || $_POST['opis'] == '') {
							echo '<span class="error">Blad: Wprowadz wszystkie dane</span>';
						}else{
							$nazwa = $_POST['nazwa'];
							$link = $_POST['obrazek'];
							$opis = $_POST['opis'];
							
							$zm1 = $mysqli->prepare("INSERT INTO cities (id, nazwa, opis, obrazek) VALUES (NULL, ?, ?, ?)");
							$zm1 -> bind_param("sss", $nazwa, $link, $opis);
							$zm1 -> execute();
							$zm1 -> close();
							echo '<span class="success">Sukces: Miasto zostało dodane i czeka na akceptację administratora</span>';
						}
					}
					
					$mysqli -> close();
					unset($_SESSION['6_letters_code']);
				}
			}
			?>
	<!-- WRAPPER KONIEC-->
	</div>
<?php include 'footer.php' ?>