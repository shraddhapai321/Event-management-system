<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/users.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark index">
            <a class="navbar-brand" href="#">EventJam</a>
            <a class="index-icon" href="login.html"><i class="fas fa-user-alt"></i></a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav index-nav">
                        <a class="nav-link index-link" aria-current="page" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <?php
        include('connect.php');
        session_start();
        $uname=$_SESSION['email'];
        $sql1="select * from admin where a_mail='$uname'";
        $result1= mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $id=$row1['aid'];
        //echo $id;
        $sql2="select * from event where id='$id'";
        $result2= mysqli_query($con, $sql2);
        
        
        $count1 = mysqli_num_rows($result2); 
        ?> 
        <div class="container-admin">
        <?php
        echo "<div class='admin'>";
        echo "<h3>Hello ".$row1['a_name']."</h3>";
        echo "<a href='event.html' class='btn btn-primary reg'>Host Event</a>";
        echo "</div>";
    
        
        echo "<form action='' method='post' enctype='multipart/form-data'>";
        echo "<select name='event' id='event'>";
        echo "<option value='0' selected>Select event</option>";
        while($row = mysqli_fetch_array($result2)) 
        {   
        
                echo"<option value='" .$row['ename'] . "'>" . $row['ename'] . "</option>";
                
        }

        echo"</select>";
        echo "<input type='submit' value='Submit' name='submit' class='btn btn-primary btn2'/>";
        echo "</form>";
        ?>
        <div class="table-box">
        <?php
        if(isset($_POST['submit']) && !empty($_POST['submit'])) {
            $selected = $_POST["event"];
            echo "<div><h3>Event : <span>".$selected."</span></h3></div>";

            
                $sql3="select eid from event where ename='$selected'";
                $result3= mysqli_query($con, $sql3);
                $row3 = mysqli_fetch_array($result3);

                $eid = $row3['eid'];
                $sql4 = "select uid from registration where eid='$eid'";
                $result4= mysqli_query($con, $sql4);
                
                if(mysqli_num_rows($result4) > 0) {
                    echo "<table class='table'> <thead>"; 
                    echo "<th scope='col'>Sl.No.</th>";
                    echo "<th scope='col'>Name</th>";
                    echo "<th scope='col'>Email</th></thead>";
                    $sl = 0;
                    while($row4 = mysqli_fetch_array($result4))
                    {   
                        $sql5="select * from users where uid= '" . $row4['uid'] ."'";
                        $result5= mysqli_query($con, $sql5);
                        $row5 = mysqli_fetch_array($result5);
                        $sl = $sl + 1;
                        $uname= $row5['u_name'];
                        $u_mail = $row5['u_mail'];
                        echo "<tbody><tr scope='row'><td>" . $sl . "</td><td>" . $uname . "</td><td>" . $u_mail . "</td></tr></tbody>"; 
                    }
                } else {
                    echo "<h6>No participants registered</h6>";
                }
                echo "</table>";
            }

        ?>
        </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c8dcf24e1f.js" crossorigin="anonymous"></script>
    </body>

</html>