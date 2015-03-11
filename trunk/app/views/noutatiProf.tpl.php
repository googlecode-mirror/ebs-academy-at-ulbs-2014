
<div id="noutati">
<?php 

    $lengthOfArray = count($noutate);
        for ($key_Number = 0; $key_Number < $lengthOfArray; $key_Number++) {
            
           echo '<div class="noutati_box">
               
                    <div class="noutati_box1">
                    <div class="noutati_col1">'. $noutate[$key_Number]['AUTOR'].'</div>
                    <div class="noutati_col2">'. $noutate[$key_Number]['DATA'].'</div>
                    </div>
                    
                    <div class="noutati_text">'. $noutate[$key_Number]['MESAJ'].'</div>
                        
                    <div class="noutati_box2">
                        <div class="noutati_col1"><a href="'.myUrl('news/adminNews/edit/'.$noutate[$key_Number]['ID']).'">Edit</a></div>
                        <div class="noutati_col2"><a href="'.myUrl('news/adminNews/delete/'.$noutate[$key_Number]['ID']).'">Delete</a></div>
                    </div>

                </div>';
            
        }
        
   
        /*
    <div id="noutati_box">
        <div>
        <div id="noutati_name">nume</div>
        <div id="noutati_date">data</div>
        </div>
        <div id="noutati_text">noutati</div>
        <div>
            <div id="noutati_name">edit</div>
            <div id="noutati_date">delete</div>
        </div>

    </div>*/

?>

    
    

    <div class="formNews">
    <form action="<?php echo myUrl('news/addNews'); ?>" method="POST" name="newsForm">
        <textarea name="noutate" style="width: 640px; height: 150px; "></textarea><br />
        <script>
            CKEDITOR.replace( 'noutate' );
        </script>
        <input type="submit" name="submit" value="Trimite">
        
    </form>
        
    </div>
</div>
