<?php
    require "mail.php";
	require "functions.php";
    check_login();
$errors = array();

extract($_POST);
    $name1 = new mysqli('localhost', 'root', '');
	$dbase_name = "verify_db";
	mysqli_select_db($name1, $dbase_name) or die(mysql_error());
	$query = "select * from movies where movie_id='".$_GET['id']."'"; 
	$data = $name1 -> query($query);
	$info = mysqli_fetch_array( $data );
	$query1 = "select * from theater where t_id='".$_GET['tid']."'"; 
	$data1 = $name1 -> query($query1);
	$info1 = mysqli_fetch_array( $data1 );
    $query2= "select * from booking where booking_id='".$_GET['bi']."'"; 
	$data2 = $name1 -> query($query2);
	$info2= mysqli_fetch_array( $data2 );



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $e=$_POST['email'];
    $p=$info2['booking_id'];
    $message = "your ticket is confirmed for movie:" .$info['title']."\ntheater:".$info1['name']." ,".$info1['address']." ,".$info1['city']." ,".$info1['state']."\ndate:".$_GET['date']."\nshowtime:".$_GET['sid']."\nNo. of tickets:".$_GET['n']."\nSeats:".$_GET['sd'];
    $subject = "Tickets";
    $recipient = $e;
    send_mail($recipient,$subject,$message);
	header("Location:payment.php?id=$p");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php if(check_login(false)):?>
    <?php include('header.php')?>
    <?php endif;?>
    <div class="wrapper" id=box>
        <form method="post">
        <center><div><img src="logo1.jpg" alt="logo" width= 80px height=50px>
</div>
<span><p class="logo">MOVIE </p></span>
<span><p class="logo1">TICKETS</p></span></center>
            <h1>Payment</h1>
        
    <form action="payment.php?id=<?php echo $info2['booking_id']; ?>" method="get">
        <p>Enter Email on which you want to recieve booking details<p>
        <div class="input-box">
                <input type="email" name="email" placeholder="email" required>
                <i class='bx bx-user' ></i>
                <button type="submit" class="btn" value="">proceed payment</button>
</form>
</body>
</html>

