
<form action="<?php echo myUrl('ops/add_new_password') ?>" method="POST" onsubmit="return checkPassSubmit();" role="form">
    <h4> Va rugam introduceti noua parola </h4>

             <div class="form-group">
            <label for="pwd">Parola:</label>
            <input type="password" class="form-control" placeholder="Intoduce-ti parola">          
          </div>
        
          <div class="form-group">
            <label for="pwd">Re-Parola:</label>
            <input type="password" class="form-control" required="required" onkeyup="checkPass(); return false;" id="pwd" placeholder="Reintrduce-ti parola">          
            </div>

            <input type="hidden" name="id" 
			value="<?php echo isset($user['ID']) ? $user['ID'] : '';?>" />
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="reset" class="btn btn-default">Reset</button>

</form>

