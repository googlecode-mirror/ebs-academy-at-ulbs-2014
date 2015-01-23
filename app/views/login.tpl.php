<HTML>
<HEAD>
    <TITLE>Login</TITLE>
</HEAD>

<body>
<h1> Va rugam introduceti datele de logare: </h1>
    <table>
                      <form method="POST" action="verificare.php">
                            <tr>
                                <td>Email</td>
                                <td> <input type="email" name="email" /></td>
                            </tr>

                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" /></td>
                            </tr>
                            
                            
                            <tr>
                                <td><input type="submit" value="Submit" /></td>
                                <td><input type="reset" value="Reset" /></td>
                            </tr>
							<tr>
                               <td colspan="2" ><a href="#">Recover password</a></td>
				
                                
                            </tr>
                      </form>     

                      
    </table>

</body>
</HTML>