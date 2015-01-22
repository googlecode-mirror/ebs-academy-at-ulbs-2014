<!DOCTYPE html>
   
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $GLOBALS['sitename'];?></title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/> 
	
</head>

<body>

        <form class="buttons" method="post" action="adaugare_user.tpl.php"> <input type="submit" value="Adauga"></form>
        <form class="buttons" method="post" action="sterge_user.tpl.php"> <input type="submit" value="Sterge"></form>

        <?php 
            $stud[0][0]="pop@email";
            $stud[0][1]="Popescu";
            $stud[0][2]="Vlad";
            $stud[0][3]="Stud";
            $stud[0][4]="04-08-1993";
            $stud[1][0]="Ion@email";
            $stud[1][1]="Ionescu";
            $stud[1][2]="Marius";
            $stud[1][3]="Stud";
            $stud[1][4]="23-11-1993";
        ?>


        <table>
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
            
                <!--<td><input type="checkbox"></td> -->
                <?php for ($key_Number = 0; $key_Number <= 1; $key_Number++) {
            echo "<tr><td><input type=\"checkbox\"></td><td>".$stud[$key_Number][0]."</td><td>".$stud[$key_Number][1]."</td><td>".$stud[$key_Number][2]."</td><td>".$stud[$key_Number][3]."</td><td>".$stud[$key_Number][4]."</td><td><form method=\"post\" action=\"modificare_user.tpl.php\"><input type=\"submit\" value=\"Modifica\"></form></td><td><form method=\"post\" action=\"sterge_user.tpl.php\"> <input type=\"submit\" value=\"Sterge\"></form></td></tr>";
    }
    ?>
            
        </table>

</body>
</html>