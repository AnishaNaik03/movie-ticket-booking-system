<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="header.css">
<div class="bg" align="center">
<div><img src="logo1.jpg" alt="logo" width= 80px height=50px>
</div>
<span><p class="logo">MOVIE </p></span>
<span><p class="logo1">TICKETS</p></span>
<div class="topnav">
  <a  href="index.php">Home</a>
  <a  href="login.php">Login</a>
  <a  href="signup.php">Register</a>
  <a  href="profile.php">Profile</a>
  <a  href="logout.php">logout</a>
  <a  href="help.php">help</a> 
  <a  href="adminlogin.php">Admin</a>   
<div class=search-container>
  <form action="search.php" id="reservation-form" method="post" onsubmit="myFunction()">
    <input type="text" placeholder="Enter A Movie Name" style="height:30px;width:300px"  required id="search111" name="search">
    <input type="submit" value="Search" style="height:34px;padding-top:3px" id="button111">       	
  </form>
</div>
</div>
<script>
function myFunction() {
     if($('#hero-demo').val()=="")
        {
            alert("Please enter movie name...");
            return false;
        }
    else{
        return true;
    }
}
    </script>