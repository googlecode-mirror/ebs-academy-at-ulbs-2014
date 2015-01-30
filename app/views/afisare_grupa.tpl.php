<!DOCTYPE html>
   
<html>
<head>
    <meta charset="UTF-8">
    <title>Afisare Grupa</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>   
</head>

<body>
    <?php
        $grupa[0]['nume']="211/2";
        $grupa[0]['an']="1";
        $grupa[0]['sef_grupa']="Gheorge Ciprian";
        $grupa[0]['profil']="Calculatoare";
        $grupa[1]['nume']="221/1";
        $grupa[1]['an']="2";
        $grupa[1]['sef_grupa']="Vlad Vasile";
        $grupa[1]['profil']="Calculatoare";
		$grupa[2]['nume']="231/1";
        $grupa[2]['an']="3";
        $grupa[2]['sef_grupa']="Nichita Ioan";
        $grupa[2]['profil']="Calculatoare";
    ?>

    <form method="post" action="#">
        <table id="tabel">
            <tr>
                <th></th>
                <th>Nume</th>
                <th>An</th>
                <th>Sef grupa</th>
                <th>Profil</th> 
				<th>Modifica</th>
                <th>Sterge</th> 
            </tr>
           
            <?php
                $lengthOfArray=count($grupa);
                for ($key_Number = 0; $key_Number <$lengthOfArray ; $key_Number++) {
                    echo "<tr><td><input type=\"checkbox\">
                    </td><td>".$grupa[$key_Number]['nume']."</td>
                    <td>".$grupa[$key_Number]['an']."</td>
                    <td>".$grupa[$key_Number]['sef_grupa']."</td>
                    <td>".$grupa[$key_Number]['profil']."</td>
                    <td><input type=\"submit\" value=\"Modifica\"></td>
                    <td><input type=\"submit\" value=\"Sterge\"></td></tr>";
                }
            ?>
        </table>
		
		<input type="submit" value="Adauga">
        <input type="submit" value="Sterge">
    </form>

</body>
</html>
