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
       
        <h1>Welcome to Library</h1>
        <?php
        
        
        session_start();
        $username = $_SESSION['username'];
        echo  "Hi,". "$username"."</br>"; 
        echo " List of Books in library";
        
        
        
        $con = mysqli_connect("localhost","root","","library");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    
                    $sql="select * from books ";                    
                    $result=mysqli_query($con,$sql);
                    
                    
                    echo "<table style='width:50%' border='1'>
                        <tr>
                        <th>book_id</th>
                        <th>name</th>
                        <th>author</th>                        
                        </tr>";
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["book id"]."</center></td>";
                                echo "<td><center>".$row["name"]."</center></td>";
                                echo "<td><center>".$row["author"]."</center></td>";
                                echo "</tr>";


                            }
                        }
                            else{
                                echo "error";
                            }

        
        ?>