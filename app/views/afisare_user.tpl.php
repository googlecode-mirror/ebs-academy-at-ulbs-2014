

<?php
$stud[0]['id'] = "1";
$stud[0]['mail'] = "pop@email";
$stud[0]['nume'] = "Popescu";
$stud[0]['prenume'] = "Vlad";
$stud[0]['tip_user'] = "Stud";
$stud[0]['data'] = "04-08-1993";
$stud[1]['id'] = "2";
$stud[1]['mail'] = "Ion@email";
$stud[1]['nume'] = "Ionescu";
$stud[1]['prenume'] = "Marius";
$stud[1]['tip_user'] = "Stud";
$stud[1]['data'] = "23-11-1993";
?>

<div id="afisare_user">
    <table id="tabel">
        <form method="post" action="<?php echo myUrl('main/adminUsers') ?>"> 
            <a href=<?php echo myUrl('main/addUser'); ?>>Adauga </a>
          

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

            <?php
            $lengthOfArray = count($stud);
            for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
                echo "<tr>"
                . " <td>"
                . "<input type=\"checkbox\" name=\"" . $stud[$key_Number]['id'] . "\" value=\"id_" . $stud[$key_Number]['id'] . "\" /></td>"
                . "<td>" . $stud[$key_Number]['mail'] . "</td>
		<td>" . $stud[$key_Number]['nume'] . "</td>
		<td>" . $stud[$key_Number]['prenume'] . "</td>
		<td>" . $stud[$key_Number]['tip_user'] . "</td>
		<td>" . $stud[$key_Number]['data'] . "</td>
		<td><input type=\"submit\" value=\"Modifica\" onclick=\"myFunction('edit')\"></td>
		<td><input type=\"submit\" value=\"Sterge\" onclick=\"myFunction('delete')\"></td></tr>";
            }
            ?>

            <input type="hidden" name="actiune" id="actiune">
            <tr>
                <td><input type="checkbox"  onclick="checkAll(this)"/></td>
                <td>Select all</td>
                <td></td>
                <td></td>
                <td></td> 
                <td></td>
                <td></td> 
                <td></td> 
            </tr>
        </form>
    </table>
</div>
