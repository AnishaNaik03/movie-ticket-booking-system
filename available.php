<?php

require "functions.php";
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="booking.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>theatres</title>

</head>

<body>
    <?php

    $name1 = new mysqli('localhost', 'root', '');
    $dbase_name = "verify_db";
    mysqli_select_db($name1, $dbase_name) or die(mysql_error());
    $query = "SELECT * from theater";
    $query2 = "SELECT * from movies where movie_id='" . $_GET['id'] . "'";
    $data = $name1->query($query);
    $data2 = $name1->query($query2);

    $info2 = mysqli_fetch_array($data2);
    ?>
    
    <div class="container">
    <h1 style="color: #ffffff;">movie name:<?php echo $info2['title']; ?><br></h1>
    <?php
    while ($info = mysqli_fetch_array($data)) {
    ?>

        <?php
        $tid = $info['t_id'];
        if($tid==$_GET['tid'] && $tid == $info2['t_id']) :
        ?>
            <h1>available in theatres<h1>
            <h1 style="color: #ffffff;"><?php echo $info['name']; ?><br>
            <?php echo $info['address']; ?><br>
             <?php echo $info['city']; ?><br>
            <?php echo $info['state']; ?></h1><br><br>
            <a href="booking2.php?id=<?php echo $info['t_id']; ?>&mid=<?php echo $info2['movie_id']; ?>"><button class="btn">select</button></a>
            <br>
            <hr><br>
        <?php
        endif;
        ?>
    <?php
    }
    ?>
    <a href="selectloc.php?id=<?php echo $info2['movie_id']; ?>"><button>Check in other theaters</button></a>
</body>
</html>