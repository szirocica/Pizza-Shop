<?php session_start(); /* session… */ ?>
<!DOCTYPE html>
<html lang="hu">
 <head>
 <title>Bejelentkezés</title>
 <meta charset="UTF-8"/>
 <link rel="stylesheet" type="text/css" href="asd2.css">
 </head>
 <body>
 <header><h1>Bejelentkezés</h1></header>
 <nav>
 <ul>
 <li><a href="index.php">Kezdőlap</a></li>
 <li><a href="index.php">Főoldal</a></li>
 <li><a href="login.php"   class="active">Bejelentkezés</a></li>
 <li><a href="reg.php">Regisztráció</a></li>
 <li><a href="logout.php">Kijelentkezés</a></li>
 <li><a href="rendeles.php" >Rendelés</a></li>
 </ul>
 </nav>
 <div class="qdsdgs">
 <?php if (isset($_SESSION["user"])) { /* ha már be van jelentkezve a user… */ ?>
 <?php echo '<h1>Bejelentkezve mint<br>' . $_SESSION["user"] . '</h1>'; //dinamikus html<-------------------------------
 echo "<br>Bejelentkezve mint " . $_SESSION["user"] . "<br>"; ?>
 <form action="logout.php" method="POST">
 <input type="submit" value="Kijelentkezés"/>
 </form>
 <form action="login.php" method="POST">
 <input type="submit" name="tovabb" value="Tovább az oldalra"/>
 <?php
 if (isset($_POST["tovabb"])) {
		header("Location: main.php");
 }?>
 </form>
 <?php } else { /* ha még nincs bejelentkezve… */ ?>
 <form action="login.php" method="POST">
 <label>Felhasználónév: <input type="text" name="username"/></label> <br/>
 <label>Jelszó: <input type="password" name="pwd"/></label> <br/>
 <input type="submit" value="Belépés" name="login-btn"/> <br/><br/>
 <p>Kétszer kell #feature</p>
 <p>Az adatok az accounts.txt-ben tárolódnak</p>
 </form>
 <?php } ?>
 <?php
 // a bejelentkezés feldolgozása
 $accounts = [];
 $file = fopen("accounts.txt", "r");
 while (($line = fgets($file)) !== false) { // regisztrált fiókok beolvasása //ciklus
 $accounts[] = unserialize($line);
 }
 fclose($file);

$a = 0;
 if (isset($_POST["login-btn"])) {
 $username = $_POST["username"];
 $password = $_POST["pwd"];
 foreach ($accounts as $acc) {						//ciklus
 if ($acc["username"] == $username && $acc["password"] == $password) {
 // sikeres bejelentkezés…
 $_SESSION["user"] = $username; // session változó beállítása
 $a+=1;
 //header("Location: main.php"); // átirányítás a főoldalra
 }
 }
 if($a == 0){
	 echo "<br>Hibás adatok!!!<br>";
 }
 }
 ?>
 </div>
 <footer><a id="button" href="#top">Vissza a lap tetejére!</a></footer>
 </body>
</html>