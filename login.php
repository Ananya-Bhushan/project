<html>
    <head>
        <meta charset="UTF-8">
         <style>
.center {
  text-align: center;
  
}
</style>
        <title>Login Page</title>
        
    </head>
    <body>
        <?php
        // put your code here
    if (isset($_POST['name'])) {
        $name = $_POST['name'];	
       
        $password = $_POST['password'];
        
        
        $con = mysqli_connect("localhost","root","","library");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
		
		
			$query = "SELECT * FROM testtable WHERE name='$name' and password='$password'";
                        $result = mysqli_query($con,$query);
                        if($result)
                        {
                            if(mysqli_num_rows($result)>0)
                            {
                                session_start();
                                $_SESSION['username'] = $name;
                                header("Location: home.php");
                            }
                            else{
                                echo("Invalid credenatials");
                            }
                            
                        }
                       
                       else{
                      echo("Invalid credenatials");
                  }
	      }
           
              else{
        ?>
        
        
        
      
        
        <form role="form" id="templatemo-preferences-form" name="registration" action="" method="post">
            <div class="center">
                <h1>Login </h1>
             <label>NAME</label><br/>

            <input type="text" id="lastName" placeholder="enter name" name="name" required> <br/>
            <label>PASSWORD</label><br/>
           
            <input type="text" id="lastName4" placeholder="enter password" name="password" required><br/>
            <br/>
            <button type="submit"  name="submit" value="Register" >Login</button>
             </div>
        </form>

        
      <?php } ?>
    </body>
    
</html>