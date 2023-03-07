<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/manageReservation.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light paddingHeder ">
			<a class="navbar-brand" href="#">Booking Hotel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="http://mgr.hotel-booking-378919.com/managersLoginPage.php?managerID=<?php echo $_GET['managerID']?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href='addHotel.php?managerID=<?php echo $_GET["managerID"]?>'>Add Hotel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href='manageReservation.php?managerID=<?php echo $_GET["managerID"]?>'>Manage My
                            Hotel's Reservations</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href='modifyHotel.php?managerID=<?php echo $_GET["managerID"]?>'>Modify My Hotels</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href='reports.php?managerID=<?php echo $_GET["managerID"]?>'>Reports</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href='http://app.hotel-booking-378919.com/'>Sign out</a>
					</li>
				</ul>
			</div>
		</nav>
    </header>

    <main class="background">

        <section class="intro">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 marginTable">
                                <h1 class="header">Manage Reservation</h1>

                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                            style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #0d6efd;">
                                                    <tr>
                                                        <th scope="col">Reservation ID</th>
                                                        <th scope="col">Hotel Name</th>
                                                        <th scope="col">User Name</th>

                                                        <th scope="col">Number of rooms</th>
                                                        <th scope="col">Reservation Date</th>
                                                        <th scope="col">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php 
$managerID=$_GET['managerID'];
$con = mysqli_connect("my-mysql.default.svc.cluster.local", "dbuser", "123456", "hotel_management");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " .
        mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT reservationID,hotelName,userName,r.num_rooms,reservationDate FROM `reservations` r JOIN `hotels` as h on r.hotelID = h.hotelID JOIN `users` as u on u.userID = r.userID WHERE active = true and h.ownerID=$managerID");


while($row = $result->fetch_assoc()){
    echo '    <tr>'; 

    $reservationID=$row['reservationID'];
    $hotelName=$row['hotelName'];
    $userName=$row['userName'];
    $num_rooms=$row['num_rooms'];
    $reservationDate=$row['reservationDate'];
    echo "<td>$reservationID</td>" ;
    echo "<td>$hotelName</td>" ; 
    echo "<td>$userName</td>" ; 
    echo "<td>$num_rooms</td>" ; 
    echo "<td>$reservationDate</td>" ; 
    echo "<td><a class=\"btn btn-primary\" style=\"color: red\" href=\"/Managers/deleteReservation.php?reservationID=$reservationID&managerID=$managerID\">DELETE</a></td>";
    echo '    </tr>'; 
}


?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>

 