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
echo "<h1 style=\"text-align:center; font-size:50px;\">Add Hotel</h1>";
$managerID = $_GET['managerID'];

echo "<a href=\"/Managers/managersLoginPage.php?managerID=$managerID\" class=\"button\">Back to Home</a>" ; 

?>

<form action="/Managers/createHotel.php" method="POST">
  <?php 
          $managerID = $_GET['managerID'];

       echo  "<input type=\"text\" name=\"managerID\" value=\"$managerID\" style=\"display:none;\">"
    ?>
    Hotel Name:<br>
    <input type="text" name="hotelName" value=""><br>
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
  <input type="number" name="num_rooms" value=""><br>
    <input type="submit" value="Submit">
  </form> 
