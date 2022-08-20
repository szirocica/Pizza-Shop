<?php session_start(); /* session… */ ?>
<!DOCTYPE html>
<html lang="hu">
 <head>
 <title>Pizza</title>
 <meta charset="UTF-8"/>
 <link rel="stylesheet" type="text/css" href="asd2.css">
 </head>
 <body>
 <header class="c"><h1 class="a b"><img src="p.jpg" alt="ikon" title="pizza" id="kep1">Pizza rendelés</h1></header>
 <nav>
 <ul>
 <li><a href="index.php"  class="active">Kezdőlap</a></li>
  <li><a href="index.php">Főoldal</a></li>
 <li><a href="login.php">Bejelentkezés</a></li>
 <li><a href="reg.php">Regisztráció</a></li>
 <li><a href="logout.php">Kijelentkezés</a></li>
 <li><a href="rendeles.php" >Rendelés</a></li>
 </ul>
 </nav>
 <main>
 <form>
 <?php
			$file = fopen("pizza.txt", "w");
			fwrite($file, "");
			fclose($file);
			$file2 = fopen("ar.txt", "w");
			fwrite($file2, "");
			fclose($file2);
 ?>
 </form>
 <h2>Jelentkezz be vagy regisztrálj hogy hozzáférj a tartalomhoz!</h2>
 <hr/>
 <p>Amíg nem jelentkezel be az oldal tartalmához(ami a főoldalon található) nem férsz hozzá. A főoldal menüpontja addig a kezdőlapra irányít</p>
 </main>
 <footer><a id="button" href="#top">Vissza a lap tetejére!</a></footer>
 </body>
</html>
