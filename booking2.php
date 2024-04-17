<?php

	require "functions.php";
	check_login();
	// extract($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="booking.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>date and timings</title>
    <!-- <style>
		body{
 	 	background: url('image/back1.jpg');
  		background-color: rgb(33, 3, 3);
}
		</style> -->
</head>
<body>
<?php 
            $name1 = new mysqli('localhost', 'root', '');
            $dbase_name = "verify_db";
            mysqli_select_db($name1, $dbase_name) or die(mysql_error());
            $query = " SELECT * FROM screens"; 
            $query5= " SELECT * FROM theater where t_id='" . $_GET['id'] . "'"; 
            $data5 = $name1-> query($query5);
            $data = $name1 -> query($query);
            $info5= mysqli_fetch_array( $data5 );
            while ($info = mysqli_fetch_array( $data ))
            {
               
            
?>
<div class="container">
                <h2 style="color: #ffffff;"><?php echo $info['screen_name'];?>
                <b><p>seats:<?php echo $info['seats'];?><br></p></b></h2>
                
                        <?php
                        $scr=$info['screen_id'];
                        $query2 = " SELECT * FROM show_time";
                        $data2 = $name1 -> query($query2);
                        while ($info2 = mysqli_fetch_array( $data2 ))
                        {
                        ?>
                       

                        <?php
                            if ($scr==$info2['screen_id']):                      
                                
                                ?>
                                <a href="booking.php?id1=<?php echo $info5['t_id'];?>&id2=<?php echo $info['screen_id'];?>&id3=<?php echo $info2['st_id'];?>&id4=<?php echo $_GET['mid'];?>"><button class="btn"><?php echo $info2['start_time'];?></button ></a>
                                <?php
                            endif;
                        ?>
                        
            
                        <?php
                        }
                        ?> 
                <br><hr><br>

        <?php
            }
            $var1=$_GET['mid'];
            echo "$var1";
        ?>

</body>
</html>