<form action="<?php echo myUrl('teme/adminTeme'); ?>" method="POST" enctype="multipart/form-data">
    <div>
        <div class="login_text"> 
            <div id="info"></div>
            Va rugam introduceti noua tema de licenta </div>
        <br />
        <div>
            <div class="col_grupa1" id="div1">Numele Grupei</div>
            <div class="col_grupa2">

                <select name="grupaID" id="grupaID" required="required">
                    <?php
                    $max = count($grupa);

                    for ($key_Number = 0; $key_Number < $max; $key_Number++) {
                        echo '<option value="' . $grupa[$key_Number]['ID'] . '">' . $grupa[$key_Number]['NUME'] . '</option>\n';
                    }
                    ?>
                </select>
                <script>
                    $("select#grupaID").change(function (e)
                    {
                     
                        var formURL = "<?php echo myUrl('teme/getMateria'); ?>";

                        
                        $.ajax({
                            url: formURL,
                            type: 'POST',
                            data: {id: $('#grupaID option:selected').val()},
                            dataType: 'json',
                            mimeType: "multipart/form-data",
                            success: function (data, textStatus, jqXHR)
                            {
                                var select = $("#materie"), options = '';
                                select.empty();
                                for (var index in data) {
                                    options+=('<option value=' + data[index].ID + '>' + data[index].DENUMIRE + '</option>');
                                }
                                select.append(options);
                                //$("#info").html('<pre><code>' + data + '</code></pre>');
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                $("#info").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus=' + textStatus + ', errorThrown=' + errorThrown + '</code></pre>');
                            }
                        });
                        e.preventDefault();
                        e.unbind();

                    });
                </script>

                <script>


                </script>



                <div id="info"></div>
            </div>

        </div>


        <div style="clear:both;">
            <div class="col_grupa1">Nume Materie</div>
            <div class="col_grupa2">
                <select name="materie" id="materie" required="required">

                </select>
            </div>

        </div>
        <div style="clear:both;">
            <div class="col_grupa1">Denumire</div>
            <div class="col_grupa2"><input type="text" name="denumire" required="required"/></div>

        </div>
        <div style="clear:both;">
            <div class="col_grupa1">Detalii</div>
            <div class="col_grupa2"><textarea style="height: 20px" name="detalii" required="required"></textarea></div>

        </div>
        
        <div style="clear:both;">
            <div class="col_grupa1">Anexa</div>
            <div class="col_grupa2"><input type="file" name="fileToUpload" multiple="multiple"></div>
            <script>
            $('#file').bind('change', function() {
                if(this.files[0].size>5242880){
  //this.files[0].size gets the size of your file.
            alert('File too big');
            $('#file').val('');
                }

});
            </script>
        </div>

        <div style="clear:both;">
            <input type="hidden" name="actiune" value="add"/>
            <div class="col_grupa1"><input type="submit" value="Trimite"/></div>
            <div class="col_grupa2"><input type="reset" value="Reseteaza"/></div>

        </div>

    </div>

</form>
