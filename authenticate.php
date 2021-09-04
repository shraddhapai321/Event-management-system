<?php      
    include('connect.php');
    echo "Hello authenticate"  ;
    $username = $_POST['username'];  
    $password = $_POST['password'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
		$sql1 = "select * from admin where username = '$username' and password = '$password'";  
	
        $result1 = mysqli_query($con, $sql1);  
		
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);  
        $count1 = mysqli_num_rows($result1);  
          
        if($count1 == 1){  
            //echo "<h1><center> Login successful </center></h1>"; 
            header("location:admin.html"); 
            
        }  
             
	  else{
        $sql = "select * from users where username = '$username' and password = '$password'";  
	
        $result = mysqli_query($con, $sql);  
		
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            //echo "<h1><center> Login successful </center></h1>"; 
            header("location: user.html"); 
            
        } 
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        } 
            
	  }
      
      
?>  