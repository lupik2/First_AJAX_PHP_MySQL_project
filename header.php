<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link href="css/bootstrap.css" rel="stylesheet">-->	
	<link rel="stylesheet" type="text/css" href="css/reset.css">	
	<link rel="stylesheet" type="text/css" href="css/style.css">	
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

	
    <title>MiastaPolskie - Sprawdź co kryją</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
	<header>
	<div id="userid"></div>
	<div id="sessionid"></div>
		<div class="content">
			<nav>
				<h1 class="float_left"><a href="index.php">Miasta Polski</a></h1>
				<ul class="float_right">
					<li class="unactive">Wybierz Miasto</li>
					<li><a href="addcity.php">Dodaj miasto</a></li>
					<li><a href="wait.php">Poczekalnia</a></li>
					<li><a href="login.php"><?php session_start(); if(isset($_SESSION['login_status'])){echo"Wyloguj";}else{echo"Zaloguj";} ?></a></li>
					<li class="unactive">Zgłoś awarie</li>
				</ul>
				<div class="clear_both"></div>
				
				<div id="search" class="float_right">
					<span>Wyszukaj: </span>
					<input type="search" disabled value="Nieaktywne"></input>
				</div>			
			</nav>		
			
			<div class="clear_both"></div>
			<h2  class="bot-left border-color-header">Dowiedz się więcej o swoim mieście!</h2>		
		</div>
	</header>