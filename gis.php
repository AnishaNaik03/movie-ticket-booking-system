<?php 
	
	$name1 = new mysqli('localhost', 'root', '');
	$dbase_name = "verify_db";
	mysqli_select_db($name1, $dbase_name) or die(mysql_error());
	$query = "select * from movies where movie_id='".$_GET['id']."'"; 
	$data = $name1 -> query($query);
    $info = mysqli_fetch_array( $data )
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<style>
    #map{
        width:2000px;
        height:600px;
    }
    .popup{
        font-size:1.1rem;
    }
</style>

</head>
<body>
    <div id="map"></div>
</body>

<script>
    const map=L.map('map');
     map.setView([15.199, 74.092],10);
    //map.setView([15.00932,74.04068],7);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

const data={
        INOX_Osia:
        {
            coords:[15.28494, 73.95738],
            title:"INOX Osia A Wing Margoa",
            web:`available.php?id=<?php echo $info['movie_id'];?>&tid=1`,
        },
        Vishant:
        {
            coords:[15.27149,73.96811],
            title:"Vishant",
            web:`available.php?id=<?php echo $info['movie_id'];?>&tid=3`,
        
        },
        MarcelaCinema:
        {
            coords:[15.51212, 73.96038],
            title:"Marcela Cinema House",
            web:`available.php?id=<?php echo $info['movie_id'];?>&tid=5`,
            
        },
        Cine_Anandi:
        {
            coords:[15.00932, 74.04068],
            title:"Cine Anandi Theatre",
            web:`available.php?id=<?php echo $info['movie_id'];?>&tid=6`,
            
        },
        INOX_Goa:
        {
            coords:[15.49849, 73.82103],
            title:"INOX Goa",
            web:`available.php?id=<?php echo $info['movie_id'];?>&tid=2`,
            
        },
        ZSquare:
        {
            coords:[15.26328, 74.10759],
            title:"Z Square Cine Niagara",
            web:`available.php?id=<?php echo $info['movie_id'];?>&tid=4`,
           
         }
    }

    for(let key in data){

        const theater =data[key];

    L.marker(theater.coords,{
        title:theater.title,
        coords:theater.coords,
    })
     //.bindPopup('theater.title,')
    .bindPopup(`
    <span class="popup" >
    ${theater.title}<br>
    <a href="${theater.web}">shows</a><br>
    </span>
    `)
    .addTo(map)
    }
   
</script>

</html>

