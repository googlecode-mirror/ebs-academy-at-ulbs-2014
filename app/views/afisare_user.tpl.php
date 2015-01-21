<HTML>
<HEAD>
    <TITLE>Select element drop down box</TITLE>
</HEAD>

<body>

        <form method="post" action="adaugare_user.tpl.php"> <input type="submit" value="Adauga"></form>
        <form method="post" action="sterge_user.tpl.php"> <input type="submit" value="Sterge">

        <TABLE>
            <TR>
                <td>Checkbox</td>
                <td >Email</td>
                <td >Nume</td>
                <td >Prenume</td>
                <td >Tip</td>
                <td >Data</td>
                <td >Modifica</td>
                <td >Sterge</td>   
            </TR>
            <TR>
                <td><input type="checkbox"</td>
                <td >a</td>
                <td >b</td>
                <td >c</td>
                <td >d</td>
                <td >e</td>
                <td ><form method="post" action="modificare_user.tpl.php"> <input type="submit" value="Modifica"></td>
                <td ><form method="post" action="sterge_user.tpl.php"> <input type="submit" value="Sterge"></td>
            </TR>
        </TABLE>

</body>
</HTML>