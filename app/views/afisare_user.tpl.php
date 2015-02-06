<!DOCTYPE html>
   
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $GLOBALS['sitename'];?></title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/> 
	
</head>

<body>
	<?php 
        $stud[0]['id']="1";
        $stud[0]['mail']="pop@email";
        $stud[0]['nume']="Popescu";
        $stud[0]['prenume']="Vlad";
        $stud[0]['tip_user']="Stud";
        $stud[0]['data']="04-08-1993";
        $stud[1]['id']="2";
        $stud[1]['mail']="Ion@email";
        $stud[1]['nume']="Ionescu";
        $stud[1]['prenume']="Marius";
        $stud[1]['tip_user']="Stud";
        $stud[1]['data']="23-11-1993";
    ?>

<div id="afisare_user">
    <form method="post" action="<?php echo myUrl('main/adminUsers') ?>"> 
		<!--<input type="submit" value="Adauga"> -->
		<a href=<?php echo myUrl('main/addUser');?>>Adauga </a>
		<input type="submit" value="Sterge">

		<table id="tabel">
            <tr>
                <th>Checkbox</th>
                <th>Email</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Tip</th>
                <th>Data</th>
                <th>Modifica</th>
                <th>Sterge</th>   
            </tr>
			<input type="text" name="actiune" id="actiune">
            <?php 
				$lengthOfArray=count($stud);
				for ($key_Number = 0; $key_Number <$lengthOfArray ; $key_Number++) {
					echo "<tr><td><input type=\"checkbox\" value=id_" . $stud[$key_Number]['id'] . ">
					</td><td>".$stud[$key_Number]['mail']."</td>
					<td>".$stud[$key_Number]['nume']."</td>
					<td>".$stud[$key_Number]['prenume']."</td>
					<td>".$stud[$key_Number]['tip_user']."</td>
					<td>".$stud[$key_Number]['data']."</td>
					<td><input type=\"submit\" value=\"Modifica\" onCick=function() {document.getElementById('actiune').value = 'edit';}></td>
					<td><input type=\"submit\" value=\"Sterge\"></td></tr>";
				}
			?>
            
        </table>
	</form>
</div>
</body>
</html>