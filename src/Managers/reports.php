<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reports.css">
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
                        <a class="nav-link"
                            href="http://mgr.hotel-booking-378919.com/Managers/managersLoginPage.php?managerID=<?php echo $_GET['managerID']?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='addHotel.php?managerID=<?php echo $_GET["managerID"]?>'>Add Hotel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='manageReservation.php?managerID=<?php echo $_GET["managerID"]?>'>Manage My
                            Hotel's Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='modifyHotel.php?managerID=<?php echo $_GET["managerID"]?>'>Modify My
                            Hotels</a>
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
                                <h1 class="header">Current Occupancy stats</h1>

                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                            style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #0d6efd ;">
                                                    <tr>
                                                        <th scope="col">Hotel ID</th>
                                                        <th scope="col">Hotel Name</th>
                                                        <th scope="col">Number of rooms</th>

                                                        <th scope="col">Number of rooms booked</th>
                                                        <th scope="col">Percentage of booked rooms</th>
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

$result = mysqli_query($con,"SELECT hotelID,hotelName,num_rooms, num_rooms - available_rooms as booked_rooms, ((num_rooms - available_rooms) / num_rooms) * 100 as percentage  from hotels where ownerID=$managerID");


while($row = $result->fetch_assoc()){
    $hotelID=$row['hotelID'];
    $hotelName=$row['hotelName'];
    $num_rooms=$row['num_rooms'];
    $booked_rooms=$row['booked_rooms'];
    $percentage=$row['percentage'];
    echo '    <tr>'; 
    echo "<td>$hotelID</td>" ;
    echo "<td>$hotelName</td>" ; 
    echo "<td>$num_rooms</td>" ; 
    echo "<td>$booked_rooms</td>" ; 
    echo "<td>$percentage %</td>" ; 
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

        <section class="intro ">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 secondTable">
                                <h1 class="header">Old/ended reservations</h1>

                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                            style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #0d6efd
                                                ;">
                                                    <tr>
                                                        <th scope="col">Hotel Name</th>
                                                        <th scope="col">Reservation ID</th>
                                                        <th scope="col">User Name</th>

                                                        <th scope="col">Reservation Start Date</th>
                                                        <th scope="col">Reservation End Date</th>
                                                        <th scope="col">Number of booked rooms</th>

                                                    </tr>
                                                </thead>
                                                <tbody>





/////////////////////////////////////////////////////////////















<?php
$result = mysqli_query($con,"SELECT hotelName,reservationID,userName,reservationDate,reservationEnd,r.num_rooms from reservations r join hotels h on h.hotelID = r.hotelID  join users u on u.userID = r.userID where ownerID=$managerID and active is false");

while($row = $result->fetch_assoc()){
    $hotelName=$row['hotelName'];
    $reservationID=$row['reservationID'];
    $userName=$row['userName'];
    $startDate=$row['reservationDate'];
    $endDate=$row['reservationEnd'];
    $num_rooms=$row['num_rooms'];
    echo '    <tr>'; 
    echo "<td>$hotelName</td>" ;
    echo "<td>$reservationID</td>" ; 
    echo "<td>$userName</td>" ; 
    echo "<td>$startDate</td>" ; 
    echo "<td>$endDate</td>" ; 
    echo "<td>$num_rooms</td>" ; 
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
