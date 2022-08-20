<?php session_start(); /* session… */ ?>
<!DOCTYPE html>
<html lang="hu">
 <head>
 <title>Főoldal</title>
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
 <li><a href="logout.php" class="active">Kijelentkezés</a></li>
 <li><a href="rendeles.php" >Rendelés</a></li>
 </ul>
 </nav>
 <div>
<?php
 session_unset(); // session változók kiürítése
 session_destroy(); // session megszüntetése

 echo "Sikeres kijelentkezés <br/>";
 echo "<a href='index.php'>Vissza a főoldalra</a>";
?>
</div>
<section><h3>Jelentkezz be hogy hozzáférhess a tartalomhoz!</h3></section>
<footer><a id="button" href="#top">Vissza a lap tetejére!</a></footer>
 </body>
</html>