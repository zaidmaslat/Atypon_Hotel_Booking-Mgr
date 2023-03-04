<?php
$reservationID=$_GET['reservationID'];
$managerID=$_GET['managerID'];


$con = mysqli_connect("my-mysql.default.svc.cluster.local", "dbuser", "123456", "hotel_management");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " .
        mysqli_connect_error();
}
//Add booked rooms to the avaialble rooms in `hotels` table
mysqli_query($con,"UPDATE hotels set available_rooms = available_rooms + (select num_rooms from reservations where reservationID = $reservationID) where hotelID = (select hotelID from reservations where reservationID = $reservationID)");
//Make reservation `inActive`
mysqli_query($con,"UPDATE reservations set active = FALSE  where reservationID = $reservationID");

//Set timestamp for ended reservations
mysqli_query($con,"UPDATE reservations set reservationEnd = CURRENT_TIMESTAMP  where reservationID = $reservationID");


//Go Back
header("Location: /Managers/manageReservation.php?managerID=$managerID");
die();

 