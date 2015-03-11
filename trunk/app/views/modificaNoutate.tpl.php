
<div id="noutati">

    <div class="formNews">
        <form action="<?php echo myUrl('news/adminNews/editDone/' . $noutate[0]['ID']); ?>" method="POST" name="newsForm">
            <textarea name="noutate" style="width: 640px; height: 150px;"><?php echo $noutate[0]['MESAJ']; ?></textarea><br />
            <script>
                CKEDITOR.replace('noutate');
            </script>

            <input type="submit" name="submit" value="Trimite">

        </form>

    </div>
</div>
