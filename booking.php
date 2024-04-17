<?php

require "functions.php";
check_login();

    $name1 = new mysqli('localhost', 'root', '');
    $dbase_name = "verify_db";
    mysqli_select_db($name1, $dbase_name) or die(mysql_error());
    $query1 = " SELECT * FROM movies where movie_id='" . $_GET['id4'] . "'";
    $data1 = $name1->query($query1);
    $info1 = mysqli_fetch_array($data1);
    $info2 = mysqli_fetch_array($name1->query(" SELECT * FROM  theater where t_id='" . $_GET['id1'] . "'"));
    $info3 = mysqli_fetch_array($name1->query(" SELECT * FROM  show_time where st_id='" . $_GET['id3'] . "'"));
    $info4 = mysqli_fetch_array($name1->query(" SELECT * FROM  screens where screen_id='" . $_GET['id2'] . "'"));
if($_SERVER['REQUEST_METHOD'] == "POST")
{

	    bookin($_POST);
		header("Location:booking_details.php");
		die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        body {
            background-image: url(Movie-1200-630.jpg);
            background-size: cover;
        }

        .container {
            padding: 16px;
            font-family: 'Times New Roman', Times, serif;
        }

        /* Full-width input fields */
        textarea,
        input[type=text],
        input[type=password],
        input[type=tel],
        input[type=number],
        input[type=date] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        textarea,
        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
            background-color: maroon;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;

        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        div.seatCharts-seat.available {
            background-color: #949494;
            padding: 2%;
        }

        .dates {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dates-item {
            width: 50px;
            height: 40px;
            background: maroon;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px 0;
            border-radius: 2mm;
            cursor: pointer;
        }

        .day {
            font-size: 12px;
        }

        .timings {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }

        .timings input:checked+label {
            background: rgb(28, 185, 120);
            color: white;
        }
    </style>
    <script>
        $(document).ready(function() {
            for (i = 1; i <= 5; i++) {

                for (j = 1; j <= 5; j++) {
                    $('#seat_chart').append('<div class="col-md-2 mt-1 mb-1 ml-0 mr-2 text-center" style="background-color:#b7e0b4;color:green"><input type="checkbox" id="seat" value="P' + (i + 'S' + j) + '" name="seat_chart[]" class="mr-2  col-md-2 mb-2" onclick="checkboxtotal();" >P' + (i + 'S' + j) + '</div>')
                }

            }

            for (i = 1; i <= 5; i++) {

                for (j = 1; j <= 5; j++) {
                    $('#seat_chart').append('<div class="col-md-2 mt-1 mb-1 ml-0 mr-2 text-center" style="background-color:#b7e0b4;color:green"><input type="checkbox" id="seat" value="R' + (i + 'S' + j) + '" name="seat_chart[]" class="mr-2  col-md-2 mb-2" onclick="checkboxtotal();" >R' + (i + 'S' + j) + '</div>')
                }

            }
        });



        function change_option(mvalue) {

            sessionStorage.setItem("movie_id_of_option", mvalue.value);
            alert(sessionStorage.getItem('movie_id_of_option'));


        }

        function checkboxtotal() {
            var seat = [];
            $('input[name="seat_chart[]"]:checked').each(function() {
                seat.push($(this).val());
            });

            var st = seat.length;
            document.getElementById('no_ticket').value = st;
            var total =st * <?php echo $info4['charge'];?>;
            $('#price_details').text(total);
            

            // $('#seat_details').text(seat.join(", "));
            $('#seat_dt').val(seat.join(", "));
            document.getElementById("price_details").value=total;

        }
    </script>
</head>

<body>
    <section class="mt-3">
        <h3 class="text-center mt-3" style="color:maroon;"> <?php echo $info1['title']; ?> </h3>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div id="seat-map" id="seatCharts">
                        <h3 class="text-center mt-3" style="color:maroon;">Select Seat</h3>
                        <hr>
                        <label class="text-center mt-3" style="width:100%;color:green;padding:3%;margin: 0px;">
                            <b>SCREEN</b>
                        </label>

                        <div class="row" id="seat_chart">
                        </div>

                    </div>
                    <br><br>
                    <h6 style="color:white;">Theatre Name :<?php echo $info2['name']; ?></h6>
                    <h6 class="mt-3" style="color:white;">Movie Show Timing:<?php echo $info3['start_time']; ?> </h6>
                    <h6 class="mt-3" style="color:white;">Ticket Price: <?php echo $info4['charge']?></h6>
                    <!-- <h6 class="mt-3" style="color:white;">Total Ticket Price</h6> -->
                    <!-- //<p class="mt-1" id="price_details" style="color:white"></p> -->
                </div>
                <div class="col-md-5">
                    <form method="post" class="mt-5">
                        <div class="container" style="color:white;">
                            <center>
                                <p>Please fill this form to book your ticket.</p>
                            </center>

                            <hr>

                            <label for="psw"><b>No. of Tickets</b></label>
                            <input type="number" style="border-radius:30px;" id="no_ticket" name="no_ticket" required>

                            <label for="psw-repeat"><b>Seat Deatils</b></label>
                            <input type="text" style="border-radius:30px;" name="seat_dt" id="seat_dt" required>

                            <label for="psw-repeat"><b>Total price</b></label>
                        <input type="number" style="border-radius:30px;" name="price_details" id="price_details" required>

                            <label for="number"><b>Booking Date</b></label>
                            <div class="timings">
                                <div class="dates">
                                    <input type="radio" name="date" id="d1" value="<?php echo $info4['date1']; ?>" checked />
                                    <label for="d1" class="dates-item">
                                        <div class="date"><?php echo $info4['date1']; ?></div>
                                    </label>
                                    <input type="radio" id="d2" name="date" value="<?php echo $info4['date2']; ?>" />
                                    <label class="dates-item" for="d2">
                                        <div class="date"><?php echo $info4['date2']; ?></div>
                                    </label>
                                    <input type="radio" id="d3" name="date" value="<?php echo $info4['date3']; ?>" />
                                    <label class="dates-item" for="d3">
                                        <div class="date"><?php echo $info4['date3']; ?></div>
                                    </label>
                                    <input type="radio" id="d4" name="date" value="<?php echo $info4['date4']; ?>" />
                                    <label class="dates-item" for="d4">
                                        <div class="date"><?php echo $info4['date4']; ?></div>
                                    </label>
                                    <input type="radio" id="d5" name="date" value="<?php echo $info4['date5']; ?>" />
                                    <label class="dates-item" for="d5">
                                        <div class="date"><?php echo $info4['date5']; ?></div>
                                    </label>

                                </div>
                            </div>
                            <br><br>
                            <button type="submit" class="btn" style="background-color:maroon;color:white;">Confirm Booking</button>
                            <hr>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>