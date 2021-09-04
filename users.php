<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/users.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>Document</title>
</head>
</body>
<nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark index">
  <a class="navbar-brand" href="#">EventJam</a>
  <a class="index-icon" href="login.html"><i class="fas fa-user-alt"></i></a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav index-nav">
      <a class="nav-link index-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>
<?php
include('connect.php');
session_start();
$email = $_SESSION['email'];
$sql = "select * from users where u_mail='$email'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$id = $row['uid'];
$name= $row['u_name'];
echo "<div class='user-info'>
<h2>";
echo " Welcome ". $name;
echo "</h2>
</div>
<h3 class='header'>";
echo "Your events";
echo "</h3>";
$sql2="select eid from registration where uid='$id'";
$result2 = mysqli_query($con, $sql2);
echo "<div class='technical-box'>
   <div class='row'>";
while($row2 = mysqli_fetch_array($result2))
{
  $sql3="select * from event where eid=".$row2['eid'];
  $result3 = mysqli_query($con, $sql3);
  $row3 = mysqli_fetch_array($result3);
  
       
       $count = mysqli_num_rows($result3);
            if($count > 0) {
                
                echo"<div class='col-sm-6 col-md-4 col-lg-3'>
                  <div class='card'>
                    <h6 class='card-header'>";
                    echo $row3['ename']; 
                    echo "</h6>
                    <div class='card-body'>
                      <p class='card-text'>";
                      echo $row3['edesc']; 
                      echo "</p>
                      <p class='card-text'>Event date : ";
                      echo $row3['eventtime'];
                      echo "</p>
                      <p class='card-text'>Register by : ";
                      echo $row3['eventdeadline'];
                      echo "</p>";
                      if($row3['ecat']==1)
                      {
                        echo "<p class='card-text'>Category : ";
                        echo "Technical";
                        echo "</p>";
                      }
                      else
                      {
                        echo "<p class='card-text'>Category : ";
                        echo "Non-Technical";
                        echo "</p>";
                    
                      }
                      
                      
                    echo "</div>
                  </div>
                </div> ";
               }
                   
        
            }
            echo"</div>
    </div>";

echo "<h3 class='header'>Events</h3>";

 $sql1 = "select * FROM event WHERE   
 eid NOT IN (SELECT eid FROM registration where uid='$id')";
 
 $result1 = mysqli_query($con, $sql1);
 echo "<div class='technical-box'>
 <div class='row'>";
 
while($row1 = mysqli_fetch_array($result1))
 {  
    
    if($row1['ecat']==1)
    {
      $eid=$row1['eid'];
       
         $count = mysqli_num_rows($result1);
            if($count > 0) {
                
                echo"<div class='col-sm-6 col-md-4 col-lg-3'>
                  <div class='card'>
                    <h6 class='card-header'>";
                    echo $row1['ename']; 
                    echo "</h6>
                    <div class='card-body'>
                      <p class='card-text'>";
                      echo $row1['edesc']; 
                      echo "</p>
                      <p class='card-text'>Event date : ";
                      echo $row1['eventtime'];
                      echo "</p>
                      <p class='card-text'>Register by : ";
                      echo $row1['eventdeadline'];
                      echo "</p>
                      <p class='card-text'>Category : ";
                      echo "TECHNICAL";
                      echo "</p>";
                     
                      echo"<form action='' method='post'>
                        <input type='submit' name='$eid' class='btn btn-primary register-btn' value='Register'>
                      </form>";
                      if(isset($_POST[$eid])/* && !empty($_POST[$eid])*/) {
            
                        $sql4="insert into registration values('$id','$eid')";
                        $result4 = mysqli_query($con, $sql4);
                        
                        
                    }
                    echo"</div>
                  </div>
                </div> ";
               }
                   
        
            }
else if($row1['ecat'] == 2)
{   
  $eid=$row1['eid'];
    $count = mysqli_num_rows($result1);
            if($count > 0) {
              echo"<div class='col-sm-6 col-md-4 col-lg-3'>
              <div class='card'>
                <h6 class='card-header'>";
                echo $row1['ename'];
                echo " </h6>
                <div class='card-body'>
                  <p class='card-text'>";
                  echo $row1['edesc']; 
                  echo "</p>
                  <p class='card-text'>Event date : ";
                  echo $row1['eventtime'];
                  echo "</p>
                  <p class='card-text'>Register by : ";
                  echo $row1['eventdeadline']; 
                  echo "</p>
                  <p class='card-text'>Category : ";
                  echo "NON-TECHNICAL"; 
                  echo "</p>";
                  
                  echo"<form action='' method='post'>
                    <input type='submit' name='$eid' class='btn btn-primary register-btn' value='Register'>
                  </form>";
                  if(isset($_POST[$eid])/* && !empty($_POST[$eid])*/) {
            
                    $sql5="insert into registration values('$id','$eid')";
                    $result5 = mysqli_query($con, $sql5);
                    // echo '<script>alert("Registration successful")</script>';  
                }
            }
                echo"</div>
              </div>
            </div> ";
           
}
 }
 echo"</div>
    </div>";
 
        
        
        
 
    
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c8dcf24e1f.js" crossorigin="anonymous"></script>
</body>

</html>
