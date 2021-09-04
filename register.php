<?php      
session_start();
    include('connect.php');
    $uname=$_SESSION['email'];
    //session_abort();
    $ename=$_POST['eventname']; 
    $ecat=$_POST['category'];
    $edesc=$_POST['eventdesc'];
    $edate=$_POST['eventtime'];
    $eddate=$_POST['eventreg'];

    $ename = stripcslashes($ename);  
    $ecat = stripcslashes($ecat); 
    $edesc=stripcslashes($edesc);
    $edate=stripcslashes($edate);
    $eddate=stripcslashes($eddate);

    $ename=mysqli_real_escape_string($con, $ename);
    $ecat=mysqli_real_escape_string($con, $ecat);
    $edesc=mysqli_real_escape_string($con, $edesc);
    $edate=mysqli_real_escape_string($con, $edate);
    $eddate=mysqli_real_escape_string($con, $eddate);
    echo $ecat;
    
    if($ecat == "0") {
        echo '<script>alert("Choose a category")</script>';
    }
    else {
        $sql1="select aid from admin where a_mail='$uname'";
        $result1= mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $id=$row1['aid'];
        $sql = "insert into event values('','$id','$ecat','$ename','$edesc','$edate','$eddate')"; 
        $result = mysqli_query($con, $sql);
        echo '<script>alert("Registration successful")</script>';  
        header("location:admin.php");
    }
    
        
    
    mysqli_close($con);
?>  