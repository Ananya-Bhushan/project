<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library</title>
        <style>
.center {
  text-align: center;

}
</style>
    </head>
    <body>
        <?php

        $Name = $Age = $Contact = $Password = "" ;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $Name = $_POST['name'];
            $Age = $_POST['age'];
            $Contact = $_POST['contact'];
            $Password = $_POST['password'];

            $con = mysqli_connect("localhost","root","","library");


			$query = "INSERT INTO `testtable` (age, contact, name, password) VALUES ('$Age', '$Contact', '$Name', '$Password')";
                        $result = mysqli_query($con,$query);
                        if($result){
			 echo ("Registration Succesful");
			            }
                                    else
                                    {
                                        echo ("Fail");
                                    }
                         }
        ?>


        <form  action="" method="post" >
            <div class="center">
            <h1>Library Registration </h1>
            <label>NAME</label></br><input type="text"   name="name"><br/>
            <label>AGE</label></br><input type="text"   name="age"><br/>
            <label>CONTACT</label></br><input type="text"   name="contact"><br/>
            <label>PASSWORD</label></br><input type="text"   name="password"><br/></br>
            <button type="submit"  name="submit" value="Register" >Update</button>
            </div>
        </form>

    </body>
</html>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

