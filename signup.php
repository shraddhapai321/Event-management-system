<?php      

    include('connect.php');  
    $uname = $_POST['username'];  
    $pass = $_POST['password'];  
    $role = $_POST['role'];
	
      
        //to prevent from mysqli injection  
        $uname = stripcslashes($uname);  
        $pass = stripcslashes($pass); 
        $role=stripcslashes($role);
       		
        $uname = mysqli_real_escape_string($con, $uname);  
        $pass= mysqli_real_escape_string($con, $pass); 
        $role= mysqli_real_escape_string($con, $role); 		
        
        if($role=="1")
        { 
            $sql = "insert into admin values('','$uname','$pass')"; 
            $result = mysqli_query($con, $sql);
            echo '<script>alert("SIGNUP SUCCESSFUL")</script>';  

        }
            
        else{
            $sql = "insert into users values('','$uname','$pass')"; 
            $result = mysqli_query($con, $sql);
            echo '<script>alert("SIGNUP SUCCESSFUL")</script>';
        }
		mysqli_close($con);
?>  