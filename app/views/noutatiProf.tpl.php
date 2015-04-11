<form action="<?php echo myUrl('news/addNews'); ?>" method="POST" name="newsForm" role="form">
    <textarea name="noutate" style="width: 640px; height: 150px; "></textarea><br />
    <script>
        CKEDITOR.replace('noutate');
    </script>
    <input type="submit" name="submit" value="Trimite">
</form>
<br>
<?php
$lengthOfArray = count($noutate);
for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
    ?>      

<div class="chenar">
    <label>Autor: <?php echo $noutate[$key_Number]['AUTOR']; ?> </label><br>
    <label>Data curenta: <?php echo $noutate[$key_Number]['DATA']; ?></label><br>
    <div class="text-primary"> <?php echo $noutate[$key_Number]['MESAJ']; ?></div>

    <button type="button" class="btn btn-default"><a href="'.myUrl('news/adminNews/edit/'.$noutate[$key_Number]['ID']).'">Edit</a>
    <button type="button" class="btn btn-default"><a href="'.myUrl('news/adminNews/delete/'.$noutate[$key_Number]['ID']).'">Delete</a>
</div>
<?php } ?>
