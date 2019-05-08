<tr bgcolor='#CCCCCC'>
                <td>Klantcode</td>
		<td>Voorletters</td>
		<td>Tussenvoegsels</td>
		<td>Achternaam</td>
                <td>Adres</td>
		<td>Postcode</td>
                <td>Woonplaats</td>
                <td>Geboortedatum</td>
                <td>Gebruikersnaam</td>
                <td>Wijzig</td>
	</tr>
	<?php 
        include_once("config.php");
        
        $result = mysqli_query($mysqli, "SELECT * FROM klant WHERE gebruikersnaam='".$_SESSION['gebruikersnaam']."'");
        
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
                echo "<td>".$res['klantcode']."</td>";
		echo "<td>".$res['voorletters']."</td>";
		echo "<td>".$res['tussenvoegsels']."</td>";
		echo "<td>".$res['achternaam']."</td>";
                echo "<td>".$res['adres']."</td>";
                echo "<td>".$res['postcode']."</td>";
                echo "<td>".$res['woonplaats']."</td>";
                echo "<td>".$res['geboortedatum']."</td>";
                echo "<td>".$res['gebruikersnaam']."</td>";
		echo "<td><a href=\"editaccountklant.php?klantcode=$res[klantcode]\">Wijzig</a> | <a href=\"deleteaccountklant.php?klantcode=$res[klantcode]\" onClick=\"return confirm('Weet u zeker dat u uw account wilt verwijderen?')\">Verwijder</a></td>";		
	}
	?>