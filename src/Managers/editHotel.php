<?php 
$con=mysqli_connect("my-mysql.default.svc.cluster.local","dbuser","123456","hotel_management");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
    if (!isset($_POST['hotelName'])) {
        echo 'No ID was specified.';
    }
    $name = $_POST['hotelName'];

    if (!isset($_POST['hotelPhone'])) {
        echo 'No hotel phone was specified.';
    }
    $hotelPhone = $_POST['hotelPhone'];
    
    if (!isset($_POST['city'])) {
        echo 'No city was specified.';
    }
    $city = $_POST['city'];

    if (!isset($_POST['num-rooms'])) {
        echo 'No num-rooms was specified.';
    }
    $num_rooms = $_POST['num-rooms'];

   mysqli_query($con,"UPDATE `hotels` SET `hotelName`='$name',`hotelPhone`='$hotelPhone',`city`='$city',`num_rooms`='$num_rooms' WHERE hotelName='$name'");

   $result = mysqli_query($con,"SELECT hotelID FROM hotels where hotelName = '$name'");
?>

