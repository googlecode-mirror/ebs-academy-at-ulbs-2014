

<?php
$prezenta = array
    (
    array('id' => 1,
        'mat' => 'ebs',
        'prez' => 'p',
        'data' => '24-11-2014'),
    array('id' => 2,
        'mat' => 'ebs',
        'prez' => 'p',
        'data' => '27-11-2014'),
    array('id' => 3,
        'mat' => 'ebs',
        'prez' => 'p',
        'data' => '28-11-2014')
);
?>
<form method="post" action="<?php echo myUrl('main/adminUsers') ?>"> 
    <div>
        <div class="afis_checkbox"> </div>
        <div class="crt"> Nr Crt. </div>
        <div class="mat"> Nume Materie </div>
        <div class="prezenta"> Prezenta </div>
        <div class="data"> Data </div>
        <div class="sterge"> Sterge </div>
        <div class="modifica"> Modifica </div>

    </div>






<?php
$i = 1;
for ($key_Number = 0; $key_Number < count($prezenta); $key_Number++) {
    echo '<div style="clear:both;">
            <div class="afis_checkbox"> <input type="checkbox" name="' . $prezenta[$key_Number]['id'] . '"/></div>
            <div class="crt">' . $i . '</div>
            <div class="mat">' . $prezenta[$key_Number]['mat'] . '</div>
            <div class="prezenta">' . $prezenta[$key_Number]['prez'] . '</div>
            <div class="data">' . $prezenta[$key_Number]['data'] . '</div>
            <div class="sterge"><input type="submit" value="Sterge" onclick="myFunction(\'delete\')"></div>
            <div class="modifica"><input type="submit" value="Modifica" onclick="myFunction(\'edit\')"></div>
	</div>
				';

    $i++;
}
?>
    <div style="clear:both;">
        <div class="afis_checkbox"><input type="checkbox"  onclick="checkAll(this)"/>Select all  </div>
        <div class="crt"> </div>
        <div class="mat">  </div>
        <div class="prezenta"></div>
        <div class="data"> </div>
        <input type="hidden" name="actiune" id="actiune">
        <div class="sterge"> <input type="submit" name="sterge"  value="Delete all"/></div>
        <div class="modifica"> <input type="submit" name="modifica"  value="Update all"/> </div>
    </div>

</form>
