<?php 
$con=mysqli_connect("my-mysql.default.svc.cluster.local","dbuser","123456","hotel_management");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
    if (!isset($_POST['managerID'])) {
        echo 'No managerID was specified.';
    }

    $managerID = $_POST['managerID'];

    if (!isset($_POST['hotelName'])) {
        echo 'No ID was specified.';
    }
    $name = $_POST['hotelName'];

    if (!isset($_POST['hotelPhone'])) {
        echo 'No hotel phone name was specified.';
    }
    $hotelPhone = $_POST['hotelPhone'];
    
    if (!isset($_POST['city'])) {
        echo 'No city was specified.';
    }
    $city = $_POST['city'];

    if (!isset($_POST['num_rooms'])) {
        echo 'No num-rooms was specified.';
    }
    $num_rooms = $_POST['num_rooms'];


    mysqli_query($con,"INSERT INTO hotels (hotelName ,hotelPhone,city,num_rooms,available_rooms,ownerid) values ('$name','$hotelPhone','$city',$num_rooms,$num_rooms,$managerID) ");

    //$result = mysqli_query($con,"SELECT hotelID FROM hotels where hotelName = '$name'");

    
?>

