<?php session_start(); /* session… */ ?>
<!DOCTYPE html>
<html lang="hu">
 <head>
 <title>Regisztráció</title>
 <meta charset="UTF-8"/>
 <link rel="stylesheet" type="text/css" href="asd2.css">
 </head>
 <body>
 <header><h1>Üdvözöllek a weboldalamon!</h1></header>
 <nav>
 <ul>
 <li><a href="index.php">Kezdőlap</a></li>
 <li><a href="index.php">Főoldal</a></li>
 <li><a href="login.php">Bejelentkezés</a></li>
 <li><a href="reg.php"  class="active">Regisztráció</a></li>
 <li><a href="logout.php">Kijelentkezés</a></li>
 <li><a href="rendeles.php" >Rendelés</a></li>
 </ul>
 </nav>
 <div class="qdsdgs">
 <?php if (isset($_SESSION["user"])) { /* ha már be van jelentkezve a user… */ ?>
 <?php echo "<p>Bejelentkezve mint " . $_SESSION["user"] . "</p>"; ?>
 <form action="logout.php" method="POST">
 <input type="submit" value="Kijelentkezés"/>
 </form>
 <?php } else { /* ha még nincs bejelentkezve… */ ?>
 <form action="reg.php" method="POST">
 <label>Felhasználónév: <input type="text" name="username"/></label> <br/>
 <label>Jelszó: <input type="password" name="pwd"/></label> <br/>
 <label>Jelszó újra: <input type="password" name="pwdd"/></label> <br/>
 <input type="submit" name="login-btn"/> <br/><br/>
 <p>Az adatok az accounts.txt-ben tárolódnak</p>
 </form>
 <?php } ?>
 <?php
 // a bejelentkezés feldolgozása
 $accounts = [];
 $file = fopen("accounts.txt", "r");
 while (($line = fgets($file)) !== false) { // regisztrált fiókok beolvasása
 $accounts[] = unserialize($line);
 }
 fclose($file);

 if (isset($_POST["login-btn"])) {
	 if(empty($_POST["username"]) || empty($_POST["pwd"]) || empty($_POST["pwdd"])){
				die("HIBA: Az összes mező kitöltése kötelező!");
				}
 $username = $_POST["username"];
 $password = $_POST["pwd"];
 $b = 0;
 foreach ($accounts as $acc) {
 if ($acc["username"] == $username) { //-------------------------------------------<<<&& $acc["password"] == $password
 echo "<br>Hibás adatok!!! foglalt felhasználónév!!<br>";
 //$_SESSION["user"] = $username; // session változó beállítása
 $b+=1;
 //header("Location: index.php"); // átirányítás a főoldalra
 }
 }
 if($_POST["pwd"] != $_POST["pwdd"]){
	 echo("A megadott jelszavak nem egyeznek!");
 }
 if($b == 0){
	 if($_POST["pwd"] == $_POST["pwdd"]){
		echo "<br>Sikeres regisztráció!<br>";
		echo "<br>Jelentkezz be!<br>";
		$acc = ["username" => $username, "password" => $password];
		$file = fopen("accounts.txt", "a");
		fwrite($file, serialize($acc) . "\n");
		fclose($file);
	 }
 }
 }
 ?>
 </div>
 <footer><a id="button" href="#top">Vissza a lap tetejére!</a></footer>
 </body>
</html>