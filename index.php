<?php

	require "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="cssfile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php if(check_login(false)):?>
		
		<h2><font color=" #81abe6">Hi, <?=$_SESSION['USER']->username?>;</font></h2>
		
	<?php endif;?>
    <?php include('header.php')?>
    <section>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">

                <div class="image">
                <?php 
            $name1 = new mysqli('localhost', 'root', '');
            $dbase_name = "verify_db";
            mysqli_select_db($name1, $dbase_name) or die(mysql_error());
            $query = " SELECT * FROM upcomings"; 
            $data = $name1 -> query($query);
            while ($info = mysqli_fetch_array( $data ))
            {
					?>
                    <div class="black">

                        <h1><?php echo $info['title'];?></h1>
                        <p>
                        <?php echo $info['Description'];?>
                        </p>
                        <div class="genre">
                            <a href="#" class="category"><?php echo $info['Genre'];?></a>
                            <a href="movie1.php?id=5" class="category">more info</a>
                        </div>
                        <div class="watch">
                            <i class="fa-solid fa-play"><a href="<?php echo $info['trailer']; ?>">trailer</a></i>
                        </div>
                        

                    </div>

                    <img src="image/<?php echo $info['poster']; ?>">

                </div>
                <?php
				}
	 			?>
              </div>
    </section>
   

    <div class="second">

        <div class="latest">

            <h1>Screening This Week</h1>
            <?php 
            $name1 = new mysqli('localhost', 'root', '');
            $dbase_name = "verify_db";
            mysqli_select_db($name1, $dbase_name) or die(mysql_error());
            $query = " SELECT * FROM movies"; 
            $data = $name1 -> query($query);
            while ($info = mysqli_fetch_array( $data ))
            {
					?>
            <div class="box">

                <div class="card">

                    <div class="details">

                        <div class="left">

               
                            <p class="name"><?php echo $info['title'];?></p>
                            <div class="date_quality">
                                <p class="quality"><a href="movie1.php?id=<?php echo $info['movie_id'];?>">more info</a></p>
                                <p class="date"><?php echo $info['release_date'];?></p>
                            </div>
                            <p class="category"><?php echo $info['Genre'];?></p>

                            <div class="info">

                                <div class="rate">
                                    <!-- <i class="fa-solid fa-star"></i> -->
                                    <p>rating:-<?php echo $info['rating'];?></p>
                                </div>
                                <div class="time">
                                    <!-- <i class="fa-regular fa-clock"></i> -->
                                    <p><?php echo $info['duration'];?></p>
                                </div>

                            </div>

                        </div>

                        <div class="right">

                        <i class="fa-solid fa-play"><a href="<?php echo $info['trailer']; ?>">trailer</a></i>

                        </div>

                    </div>
                    
                    <img src="image/<?php echo $info['poster'];?>">
                    
                </div>
                <?php
				}
	 			?>

<br>
     </div>

<br>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
    
</body>
</html>