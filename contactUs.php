<html>
	<head>
		<title>A-CET</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	</head>
	<body class="is-preload" onload="">
		<!-- login script -->
		
		<!-- Header -->
			<header id="header">
				<a class="logo" href="office system.php">A-CET Computers</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>
			<div id="heading" >
				<h1>Office system</h1>
			</div>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="acet shop.php">Acet Shop</a></li>
					<li><a href="#">Acet Courses</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="logOut.php">Log Out</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="elements.php">Elements</a></li>
				</ul>
			</nav>
<h1>My First Google Map</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
	var myCity = new google.maps.Circle({
  center:amsterdam,
  radius:20000,
  strokeColor:"#0000FF",
  strokeOpacity:0.8,
  strokeWeight:2,
  fillColor:"#0000FF",
  fillOpacity:0.4
});
	var infowindow = new google.maps.InfoWindow({
  content:"Hello World!"
});

infowindow.open(map,marker);
var marker = new google.maps.Marker({position: myCenter});

marker.setMap(map);
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>



		</body>
		</html>