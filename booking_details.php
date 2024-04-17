<?php

require "functions.php";
check_login();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>booking_details</title>
</head>

<body>
    <?php
    $name1 = new mysqli('localhost', 'root', '');
    $dbase_name = "verify_db";
    mysqli_select_db($name1, $dbase_name) or die(mysql_error());
    $query1 = " SELECT * FROM booking ";
    $data1 = $name1->query($query1);
    $info1 = mysqli_fetch_array($data1);
    
    
    $info5 = mysqli_fetch_array($name1->query(" SELECT * FROM  users where id='".$info1['user_id']."'" ));
    $info4 = mysqli_fetch_array($name1->query(" SELECT * FROM  movies where movie_id='".$info1['movie_id']."'"));
    $info3 = mysqli_fetch_array($name1->query(" SELECT * FROM  theater where t_id='".$info1['t_id']."'"));
    $info6 = mysqli_fetch_array($name1->query(" SELECT * FROM  show_time where st_id='".$info1['st_id']."'"));
    $info2 = mysqli_fetch_array($name1->query(" SELECT * FROM  screens where screen_id='".$info1['screen_id']."'"));
    ?>
    <div class="wrapper" id="box">
        <center>
            <div><img src="logo1.jpg" alt="logo" width=80px height=50px>
            </div>
            <span>
                <p class="logo">MOVIE </p>
            </span>
            <span>
                <p class="logo1">TICKETS</p>
            </span>
        </center>

        <br><br>
        <h2>
            <font color=white>Booking Details</font>
        </h2>
        <br><br>
            <font color="white">Username: <?=$_SESSION['USER']->username?></font><br>   
        
            <font color="white">Moviename: <?php echo $info4['title']?></font><br>   
        
            <font color="white">Theatre: <?php echo $info3['name']?></font><br>   
    
        
         <font color="white">Date of show: <?php echo $info1['date_of_show']?></font><br> 
    
            <font color="white">Timings: <?php echo $info6['start_time']?></font><br>   
        
            <font color="white">Screen: <?php echo $info2['screen_name']?></font><br>   
        
        <font color="white">Number of seats booked:  <?php echo $info1['number_of_tickets']?></font><br>
        <font color="white">Total price: <?php echo $info1['price']?></font><br>
        <font color="white">Seat Details: <?php echo $info1['booking_details']?></font><br>
        
        
        <a href="proceed_pay.php?id=<?php echo $info1['movie_id'];?>&tid=<?php echo $info1['t_id'];?>&sid=<?php echo $info6['start_time'];?>&date=<?php echo $info1['date_of_show'];?>&n=<?php echo $info1['number_of_tickets']?>&sd= <?php echo $info1['booking_details']?>&bi= <?php echo $info1['booking_id']?>">
            <button>proceed to payment</button>
        </a>
    </div>
</body>

</html>