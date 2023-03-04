<style type="text/css">
    #currentoccupancy {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #currentoccupancy td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #currentoccupancy tr:nth-child(even){background-color: #f2f2f2;}
    
    #currentoccupancy tr:hover {background-color: #ddd;}
    
    #currentoccupancy th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: magenta;
      color: white;
    }

    #oldReservations {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #oldReservations td, #customers th {
    border: 1px solid purple;
    padding: 8px;
  }
  
  #oldReservations tr:nth-child(even){background-color: #f2f2f2;}
  
  #oldReservations tr:hover {background-color: #ddd;}
  
  #oldReservations th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: blue;
    color: white;
  }

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


</style>
<?php 
$managerID=$_GET['managerID'];
$con = mysqli_connect("my-mysql.default.svc.cluster.local", "dbuser", "123456", "hotel_management");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " .
        mysqli_connect_error();
}
echo "<a href=\"/Managers/managersLoginPage.php?managerID=$managerID\" class=\"button\">Back to Home</a>" ; 
// Get currentoccupancy 
// hotelID,hotelName, number-of-total-rooms, number-of-rooms-occupied , precentage
$result = mysqli_query($con,"SELECT hotelID,hotelName,num_rooms, num_rooms - available_rooms as booked_rooms, ((num_rooms - available_rooms) / num_rooms) * 100 as percentage  from hotels where ownerID=$managerID");
// restuns : hotelID,hotelName,num_rooms,booked_rooms,percentage
echo '<h4>Current Occupancy stats</h4>';
echo '<table id="currentoccupancy">'; 
echo '    <tr>'; 
echo '        <th>Hotel ID</td>'; 
echo '        <th>Hotel Name</td>'; 
echo '        <th>Number of rooms</td>'; 
echo '        <th>Number of rooms booked</td>'; 
echo '        <th>Percentage of booked rooms</td>';
echo '    </tr>'; 
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

echo '    </tr>';
echo '</table>';
echo "<hl>";
echo '<h4>Old/ended reservations</h4>';



// Get old reservations (ended)
//oldReservations
// hotelName,reservationID,userName,startDate,endDate,num-rooms-reserved

$result = mysqli_query($con,"SELECT hotelName,reservationID,userName,reservationDate,reservationEnd,r.num_rooms from reservations r join hotels h on h.hotelID = r.hotelID  join users u on u.userID = r.userID where ownerID=$managerID and active is false");
echo '<table id="oldReservations">'; 
echo '    <tr>'; 
echo '        <th>Hotel Name</td>'; 
echo '        <th>Reservation ID</td>'; 
echo '        <th>User Name</td>'; 
echo '        <th>Reservation Start Date</td>'; 
echo '        <th>Reservation End Date</td>'; 
echo '        <th>Number of booked rooms</td>';
echo '    </tr>'; 
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

echo '    </tr>';
echo '</table>';




echo '    </tr>';
echo '</table>';
echo '<br>';


?>


