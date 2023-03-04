<style type="text/css">
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
echo "<h1 style=\"text-align:center; font-size:50px;\">Modify Hotel</h1>";
echo "<br>";
$managerID = $_GET['managerID'];

echo "<a href=\"/Managers/managersLoginPage.php?managerID=$managerID\" class=\"button\">Back to Home</a>" ; 

?>

<form action="/Managers/editHotel.php" method="POST">
    Hotel Name:<br>
    <?php
        $managerID = $_GET['managerID'];
        $con=mysqli_connect("my-mysql.default.svc.cluster.local","dbuser","123456","hotel_management");
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " ;
        mysqli_connect_error();}

        $result = mysqli_query($con,"SELECT distinct hotelName FROM hotels where ownerID = $managerID");

        echo "<select name=\"hotelName\">" ;
        while($row = $result->fetch_assoc()){
          echo "<option value=" . $row['hotelName'] . ">"  . $row['hotelName'] .  "</option>";
      }
        echo "</select><br>";
    ?>
    hotel-phone:<br>
    <input type="text" name="hotelPhone" value=""><br>
    City:<br>
    <select name="city">
      <option value="Tafila">Tafila</option>
      <option value="Amman">Amman</option>
      <option value="Irbid">Irbid</option>
      <option value="Ajloun">Ajloun</option>
      <option value="Madaba">Madaba</option>
      <option value="Karak">Karak</option>
    </select><br>
  number-of-rooms:<br>
  <input type="number" name="num-rooms" value=><br>
    <input type="submit" value="Submit">
  </form> 