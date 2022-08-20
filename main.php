<?php session_start(); /* session… */ ?>
<!DOCTYPE html>
<html lang="hu">
<head>
<title>Pizzák</title>
 <meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="asd2.css">
</head>
<body>
<header class="c"><h1 class="a b"><img src="p.jpg" alt="ikon" title="pizza" id="kep1">Pizza rendelés</h1></header>
 <nav>
 <ul>
 <li><a href="index.php">Kezdőlap</a></li>
  <li><a href="index.php" class="active">Főoldal</a></li>
 <li><a href="login.php">Bejelentkezés</a></li>
 <li><a href="reg.php">Regisztráció</a></li>
 <li><a href="logout.php">Kijelentkezés</a></li>
 <li><a href="rendeles.php" >Rendelés</a></li>
 </ul>
 </nav>
 <div>
<?php
	echo "Sikeres bejelentkezés!";
?>
<?php if (isset($_SESSION["user"])) { /* ha már be van jelentkezve a user… */ ?>
<?php echo "<br>Bejelentkezve mint " . $_SESSION["user"] . "<br>"; } ?>
<form action="logout.php" method="POST">
 <input type="submit" value="Kijelentkezés"/>
 </form>
<?php
		$osszesara = 0;
		$_SESSION["osszesara"] = $osszesara;
		$_SESSION["gombas"] = 0;
		$_SESSION["gombasara"] = 0;
		$pizzak = [[]];
					?>
	</div>
	<main>
		<h1>Válassz!</h1>
	</main>
	<div class="qdsdgs">
	<form action="main.php" method="POST">
		<table><caption><h3>Pizzák</h3></caption>
			<thead>
				<tr>
					<th id="név">Név</th>
					<th id="feltétek">Feltétek</th>
					<th id="összetevők">Összetevők</th>
					<th id="allergének">Allergének</th>
					<th id="ár">ár</th>
					<th id="darabszám">db</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td headers="név">Gombás</td>
					<td headers="feltétek"><select>
					<option selected>Paradicsomos</option>
					<option>Tejfölös</option>
					<option>Pizzaszósz</option>
					<option>Tzatziki alap</option>
					</select>
					</td>
					<td headers="összetevők">Gomba, sajt</td>
					<td headers="allergének">tej</td>
					<td headers="ár">1400 ft,-</td>
					<td headers="darabszám"><label>db.:<input type="text" name="db1" size="3"></label></td>
				</tr>
				<tr>
					<td headers="név">Kolbászos</td>
					<td headers="feltétek"><select>
					<option selected>Paradicsomos</option>
					<option>Tejfölös</option>
					<option>Pizzaszósz</option>
					<option>Tzatziki alap</option>
					</select>
					</td>
					<td  headers="összetevők">Kolbász, sajt</td>
					<td headers="allergének">tej</td>
					<td headers="ár">1400 ft,-</td>
					<td headers="darabszám"><label>db.:<input type="text" name="db2" size="3"></label></td>
				</tr>
				<tr>
					<td headers="név">Kagylós</td>
					<td headers="feltétek"><select>
					<option selected>Paradicsomos</option>
					<option>Tejfölös</option>
					<option>Pizzaszósz</option>
					<option>Tzatziki alap</option>
					</select>
					</td>
					<td  headers="összetevők">Tengeri kagyló, sajt</td>
					<td headers="allergének">tej</td>
					<td headers="ár">1340 ft,-</td>
					<td headers="darabszám"><label>db.:<input type="text" name="db3" size="3"></label></td>
				</tr>
				<tr>
					<td headers="név">4 évszak</td>
					<td headers="feltétek"><select>
					<option selected>Paradicsomos</option>
					<option>Tejfölös</option>
					<option>Pizzaszósz</option>
					<option>Tzatziki alap</option>
					</select>
					</td>
					<td  headers="összetevők">Sonka, borsó, kukorica, gomba, sajt</td>
					<td headers="allergének">tej</td>
					<td headers="ár">1240 ft,-</td>
					<td headers="darabszám"><label>db.:<input type="text" name="db4" size="3"></label></td>
				</tr>
				<tr>
					<td headers="név">Margaréta</td>
					<td headers="feltétek"><select>
					<option selected>Paradicsomos</option>
					<option>Tejfölös</option>
					<option>Pizzaszósz</option>
					<option>Tzatziki alap</option>
					</select>
					</td>
					<td  headers="összetevők">Sajt</td>
					<td headers="allergének">tej</td>
					<td headers="ár">1340 ft,-</td>
					<td headers="darabszám"><label>db.:<input type="text" name="db5" size="3"></label></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6"><input type="submit" name="kosarba" value="kosarba"/></td>
				</tr>
			</tfoot>
		</table>
		</form>
							<?php
						if (isset($_POST["kosarba"])) {
							$file = fopen("pizza.txt", "w");
							$_SESSION["kosarures"] = 1;
							if($_POST["db1"] > 0){
								//$_SESSION["gombas"] = $_POST["db1"];
								//$_SESSION["gombasara"] = $_POST["db1"]*1400;
								$pizzak[0] = [["pizza" => "Gombás", "ar" => 1400, "db" => $_POST["db1"]]];
								$_SESSION["osszesara"]+=$_POST["db1"]*1400;
								echo "<br>Gombás :" . $_POST["db1"] . "db, ára:" . $_POST["db1"] * 1400 . "ft,- <br>";
								fwrite($file, "Gombás " . $_POST["db1"] . "db, ára:" . $_POST["db1"] * 1400 . "\n");
							}
							if($_POST["db2"] > 0){
								$pizzak[1] = [["pizza" => "Kolbászos", "ar" => 1340, "db" => $_POST["db2"]]];
								$_SESSION["osszesara"]+=$_POST["db2"]*1400;
								echo "<br>Kolbászos :" . $_POST["db2"] . "db, ára:" . $_POST["db2"] * 1340 . "ft,- <br>";
								fwrite($file, "Kolbászos " . $_POST["db2"] . "db, ára:" . $_POST["db2"] * 1340 . "\n");
							}
							if($_POST["db3"] > 0){
								$pizzak[2] = [["pizza" => "Kagylós", "ar" => 1240, "db" => $_POST["db3"]]];
								$_SESSION["osszesara"]+=$_POST["db3"]*1340;
								echo "<br>Kagylós :" . $_POST["db3"] . "db, ára:" . $_POST["db3"] * 1240 . "ft,- <br>";
								fwrite($file, "Kagylós " . $_POST["db3"] . "db, ára:" . $_POST["db3"] * 1240 . "\n");
							}
							if($_POST["db4"] > 0){
								$pizzak[3] = [["pizza" => "négyévszak", "ar" => 1340, "db" => $_POST["db4"]]];
								$_SESSION["osszesara"]+=$_POST["db4"]*1240;
								echo "<br>Négyévszak :" . $_POST["db4"] . "db, ára:" . $_POST["db4"] * 1340 . "ft,- <br>";
								fwrite($file, "Négyévszak " . $_POST["db4"] . "db, ára:" . $_POST["db4"] * 1340 . "\n");
							}
							if($_POST["db5"] > 0){
								$pizzak[4] = [["pizza" => "margaréta", "ar" => 1340, "db" => $_POST["db5"]]];
								$_SESSION["osszesara"]+=$_POST["db5"]*1340;
								echo "<br>Margaréta :" . $_POST["db5"] . "db, ára:" . $_POST["db5"] * 1340 . "ft,- <br>";
								fwrite($file, "Margaréta " . $_POST["db5"] . "db, ára:" . $_POST["db5"] * 1340 . "\n");
							}
							
							if(empty($_POST["db1"]) && empty($_POST["db2"]) && empty($_POST["db3"]) && empty($_POST["db4"]) && empty($_POST["db5"])){
								echo("HIBA: nincs kitöltött mező.");
								echo '<h1>Amíg üres a kosár nem fogsz tudni rendelni</h1>'; //----------------------dinamikus
								echo '<h3>Válassz bátran!</h3>';
							}
							
							//if(!empty($_POST["db1"]) || !empty($_POST["db2"]) || !empty($_POST["db3"]) || !empty($_POST["db4"]) || !empty($_POST["db5"])){
							//$file = fopen("pizza.txt", "w");
						
							fwrite($file, "Összesen: " . $_SESSION["osszesara"] . "\n");
							fclose($file);
							$file2 = fopen("ar.txt", "w");
							if($_SESSION["osszesara"] > 0){
								fwrite($file2, "ok");
							}
							if(!$_SESSION["osszesara"] > 0){
								fwrite($file2, "HIBA");
							}
							fclose($file2);
							}
							print_r($pizzak);
							echo '<h4>A selekciódhoz nem tudsz hozzáadni csak újat összeállítani!</h4>';//----------------------dinamikus

			echo "<br>Összes ára: " . $_SESSION["osszesara"];
			if (isset($_POST["tovabbb"])) {
				header("Location: rendeles.php");
			}
					?>
		<form action="main.php" method="POST">
		<input type="submit" name="tovabbb" value="Tovább a megrendeléshez"/>
		</form>
 </div>
 <footer><a id="button" href="#top">Vissza a lap tetejére!</a></footer>
</body>
</html>