<?php

require ('conf.php');

go_home();

// Ühenduse tegemine protseduuriga

$conn = mysqli_connect($server, $user, $pass);

if (!$conn) {
	die("Ühendusega on halvasti ".mysqli_connect_error);
}

echo "<p>Ühendus protseduuriga on olemas!</p>";

// Funktsioon kirje lisamiseks

function write_record($conn) {

	$sql_write = "INSERT INTO ms17.nimekiri (EesNimi, PereNimi, id_code) VALUES('Endle','Eesvärav','32124856791')";

	if (mysqli_query($conn, $sql_write)) {
		echo "<p>Kirje lisamine õnnestus</p>";
	} else {
		echo "<p>Viga: ".mysqli_error($conn)."</p>";
	}

	mysqli_close($conn);

}
// kirje lisamine baasi
function show_all($conn) {
	$sql_select_all = "SELECT * FROM ms17.nimekiri";
	$result = mysqli_query($conn, $sql_select_all);
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<p>id: ".$row["id"].
			"Eesnimi: ".$row["EesNimi"].
			"Perenimi: ".$row["PereNimi"].
			"Isikukood: ".$row["id_code"].
			"Sisestusaeg: ".$row["time"]."</p>";
		}
	} else { echo "Tabel on tühi";}
	mysqli_close($conn);
}


function write_button($conn) {
	echo "<input type='submit' name='insert_record' value='Sisesta kirje'>";
	if(isset($_POST['insert_record'])) {
		write_record($conn);
	}
}

function show_all_button($conn) {
	echo "<input type='submit' name='show_all' value='Näita kõiki kirjeid'>";
	if(isset($_POST['show_all'])) {
		show_all($conn);
	}
}

// konkreetse kirje otsimine
function search_by($conn) {
	$sql_select_all = "SELECT * FROM ms17.nimekiri WHERE id='". $_GET['id']."'";
	$result = mysqli_query($conn, $sql_select_all);
	
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<p>id: ".$row["id"].
			"Eesnimi: ".$row["EesNimi"].
			"Perenimi: ".$row["PereNimi"].
			"Isikukood: ".$row["id_code"].
			"Sisestusaeg: ".$row["time"]."</p>";
		}
	} else { echo "Sellist kirjet ei ole";}
	mysqli_close($conn);
}
// kirje otsimise nupp
function search_by_button($conn) {
	echo "<input type='submit' name='search_by' value='Näita ühte kirjet'>";
	if(isset($_GET['search_by'])) {
		search_by($conn);
		var_dump($_GET);
	}
}

// kirje kustutamine baasist
function delete_record($conn) {

	$sql_delete = "DELETE FROM ms17.nimekiri WHERE id='". $_GET['id']."'";

	if (mysqli_query($conn, $sql_delete)) {
		echo "<p>Kirje kustutamine õnnestus</p>";
	} else {
		echo "<p>Viga: ".mysqli_error($conn)."</p>";
	}

	mysqli_close($conn);

}


// kirje kustutamine andmebaasi nupule vajutades (GET)
function delete_button($conn) {
	echo "<input type='submit' name='delete_record' value='Kustuta kirje'>";
	if(isset($_GET['delete_record'])) {
		delete_record($conn);
	}
}

// kirje kustutamine andmebaasi nupule vajutades (POST)
function delete_button_post($conn) {
	echo "<input type='submit' name='delete_record' value='Kustuta kirje'>";
	if(isset($_POST['delete_record_posts'])) {
		delete_record_post($conn);
	}
}



?>

<!DOCTYPE html>
<html>
    
<!-- Sisestusvorm -->
<form action="" method="post">
	<h3>Kirje sisestamine</h3>
	<ul>
		<li>
		<label for="Eesnimi">Eesnimi</label>
		<input type="text" name="eesnimi">
		<label for="Perenimi">Perenimi</label>
		<input type="text" name="perenimi">
		<label for="Eesnimi">Eesnimi</label>
		
		</li>
	</ul>
	<p><?php write_button($conn);  ?></p>
	
</form>
<!-- Väljastusvorm (näitab kõiki kirjeid) -->
<form action="" method="post">

	<p><?php show_all_button($conn);  ?></p>
	
</form>

<form action="" method="get">
	<ul>
		<li>
		<label for="ID">ID</label>
		<input type="text" name="id">
		</li>
		<li>
		<?php search_by_button($conn); ?>
		</li>
		</li>
	</ul>
	
</form>

<h3>GET meetod !!ÄRGE MINGIL JUHUL NII KASUTAGE SISESTUSEKS EGA KUSTUTAMISEKS! </h3>
<form action="" method="get">
	<ul>
		<li>
		<label for="ID">ID</label>
		<input type="text" name="id">
		</li>
		<li>
		<?php delete_button($conn); ?>
		</li>
		</li>
	</ul>
	
</form>

</html>


