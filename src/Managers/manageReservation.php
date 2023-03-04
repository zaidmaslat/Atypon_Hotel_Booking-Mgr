<style type="text/css">
    #reservations {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #reservations td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #reservations tr:nth-child(even){background-color: #f2f2f2;}
    
    #reservations tr:hover {background-color: #ddd;}
    
    #reservations th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
    input[type=button], input[type=submit], input[type=reset] {
  background-color: red;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
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

//checking the availability of rooms: 
$result = mysqli_query($con,"SELECT reservationID,hotelName,userName,r.num_rooms,reservationDate FROM `reservations` r JOIN `hotels` as h on r.hotelID = h.hotelID JOIN `users` as u on u.userID = r.userID WHERE active = true and h.ownerID=$managerID");

echo '<table id="reservations">'; 
echo '    <tr>'; 
echo '        <th>Reservation Id</td>'; 
echo '        <th>Hotel Name</td>'; 
echo '        <th>User Name</td>'; 
echo '        <th>Number of rooms booked</td>'; 
echo '        <th>Reservation Date</td>';
echo '        <th>Delete?</td>'; 
echo '    </tr>'; 

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


echo '    </tr>';
echo '</table>';
?>


