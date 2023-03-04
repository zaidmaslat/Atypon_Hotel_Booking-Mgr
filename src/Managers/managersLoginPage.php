<?php
        $managerID = $_GET['managerID'];

?>


<?php
echo "<h1 style=\"text-align:center; font-size:50px;\">Managers Page</h1>";
?>
<?php
echo "<h1 style='color:blue; text-align:center; font-size:25px;'><a href='addHotel.php?managerID=$managerID'>Add Hotel</a></h1>";
?>
<?php
echo "<h1 style='color:blue; text-align:center; font-size:25px;'><a href='modifyHotel.php?managerID=$managerID'>Modify My Hotels</a></h1>";
?>
<?php
echo "<h1 style='color:blue; text-align:center; font-size:25px;'><a href='manageReservation.php?managerID=$managerID'>Manage My Hotel's Reservations</a></h1>";
?>
<?php
echo "<h1 style='color:blue; text-align:center; font-size:25px;'><a href='reports.php?managerID=$managerID'>Reports</a></h1>";
?>
