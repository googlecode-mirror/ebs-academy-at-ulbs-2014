<h2> Va rugam introduceti datele de logare</h2>
<form action="<?php echo myUrl('ops/check_login'); ?>" method="POST" role="form">   
 <div class="col-lg-8 col-md-6 col-xs-4 col-sm-2">  
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control"  name="email" placeholder="Enter email">
        </div>
    
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password">          
        </div>
    
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
        
        <button type="button" class="btn btn-link"><a href="<?php echo myUrl('main/recover'); ?>"> Recover Password</a></button>
</div>
</form>
    
    