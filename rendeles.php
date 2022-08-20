<?php session_start(); /* sessionâ€¦ */ ?>
<!DOCTYPE html>
<html lang="huf">
<head>
<title>Rendelés</title>
 <meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="asd2.css">
</head>
<body>
<header class="c"><h1 class="a b"><img src="p.jpg" alt="ikon" title="pizza" id="kep1">Pizza rendelés</h1></header>
 <nav>
 <ul>
 <li><a href="index.php">Kezdőlap</a></li>
  <li><a href="index.php">Főoldal</a></li>
 <li><a href="login.php">Bejelentkezés</a></li>
 <li><a href="reg.php">Regisztráció</a></li>
 <li><a href="logout.php">Kijelentkezés</a></li>
 <li><a href="reg.php" class="active">Rendelés</a></li>
 </ul>
 </nav>
 <div>

<h1>Rendeles</h1>

<?php if (isset($_SESSION["user"])) { /* ha már be van jelentkezve a user… */ ?>
<?php echo "<p>Bejelentkezve mint " . $_SESSION["user"] . "</p>"; } ?>
<form action="logout.php" method="POST">
 <input type="submit" value="Kijelentkezés"/>
 </form>
 </div>
 <div class="qdsdgs">
<?php

	$file = fopen("pizza.txt", "r");
	echo "A kosar tartalma:<br>";
	$_SESSION["uuu"] = 0;
	if ($file === FALSE)
	echo("Hiba: A kosar ures");
	$szoveg2 = fread($file, filesize("pizza.txt"));
	fclose($file);
	
	if(strlen($szoveg2) == 0){
		echo "HIBA: A kosar ures!";
		$_SESSION["uuu"] = 1;
	}
	
	$szoveg2 = $szoveg2 . " ft<br>";
	echo "<br>" . $szoveg2;
	
	
	
?>
<form action="rendeles.php" method="POST">
<fieldset><legend><h3>Megrendelő adatai</h3></legend>
		<label> Vezetéknév:<input type="text" name="vnev" placeholder="Vezetéknév"></label><label> Keresztnév:<input type="text" name="knev" placeholder="Keresztnév"></label><br>
		<label> Telefonszám:<input type="text" name="telefonszam" placeholder="Telefonszám"></label><label> E-mail:<input type="email" name="email" placeholder="E-mail"></label><br>
		<label for="foo1">Szállítási név:</label>
		<input type="text" name="szallitasinev" id="foo1" placeholder="Szállítási név">
		<label for="foo2">Település:</label>
		<input type="text" name="telepules" id="foo2" placeholder="Település"><br>
		<label for="foo3">Szállítási cím:</label>
		<input type="text" name="cim" id="foo3" placeholder="utca, házszám"><br>
		<label for="f">Fizetés módja:</label>
		<select id="f" name="fizetes"><option>Készpénzben a futárnál</option><option>Kártyával a futárnál</option></select><br>
		<label>Megjegyzés:<textarea name="megj" rows="3" cols="30"></textarea></label>
		</fieldset>
		<input type="reset" name="reset-btn" value="Törlés"/>
		<input type="submit" name="veglegesit" value="Megrendelés">
		<hr>
</form>

<?php
	//Az összes mező kitöltése kötelező
	if(isset($_POST["veglegesit"])){
		if($_SESSION["uuu"] == 1){
			die("<br>HIBA: A kosár üres!");
		}
		$file2 = fopen("ar.txt", "r");
		$_SESSION["van"] = fread($file2, filesize("ar.txt")); 
		fclose($file2);
		if($_SESSION["van"] == "HIBA"){
			die("<br>HIBA: A kosár üres!");
		}
			if(empty($_POST["vnev"]) || empty($_POST["knev"]) || empty($_POST["telefonszam"]) || empty($_POST["email"]) || empty($_POST["szallitasinev"]) || empty($_POST["telepules"]) || empty($_POST["cim"]) || empty($_POST["szallitasinev"])){
				die("<br>HIBA: Az összes mező kitöltése kötelező, a megjegyzést kivéve<br>");
			}
			echo "Sikeres rendelés";
			echo '<h2>Köszönjük a rendelést!	' . $_SESSION["user"] . '<br>Rendelj tőlünk máskor is!</h2>';//--------------------------dinamikus
			echo '<br><img src="l.png" alt="ikon" title="pizza" id="kep1">';//--------------------------dinamikus
			//fajlok
	}
	$_SESSION["uuu"] = 0;	
?>
</div>
<div id="fgh"><h3>Oldalértékelés</h3>
	<p><p>Megfelelő az oldal?</p> 
		<label for="rad2">Igen<input type="radio" id="rad2"></label>
		<label for="rad3">nem<input type="radio" id="rad3"></label>
		<h3></h3>
		<label>Mennyire ajánlanád az oldalt ismerőseidnek?<input type="range" min="1" max="100" value="50" class="slider" id="myRange"></label>
	<input type="submit" value="Értékelés">
	</div>
<footer><a id="button" href="#top">Vissza a lap tetejére!</a></footer>
</body>
</html>