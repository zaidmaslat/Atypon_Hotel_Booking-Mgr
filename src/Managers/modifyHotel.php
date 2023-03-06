<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/addHotel.css">
</head>

<body>

    <div>
        <div class="registration-form">
            <form action="/Managers/editHotel.php" method="POST">
                <div class="form-group displayField arrow">
                    <label class="marginLabel">Hotel Name</label>
                     <select name="hotelName" class="form-control item">
    <?php
        $managerID = $_GET['managerID'];
        $con=mysqli_connect("my-mysql.default.svc.cluster.local","dbuser","123456","hotel_management");
        $result = mysqli_query($con,"SELECT distinct hotelName FROM hotels where ownerID = $managerID");
        while($row = $result->fetch_assoc()){
          echo "<option value=" . $row['hotelName'] . ">"  . $row['hotelName'] .  "</option>";
      }
    ?>
                    </select>
                </div>
                <div class="form-group displayField">
                    <?php 
                              $managerID = $_GET['managerID'];
                    
                           echo  "<input type=\"text\" name=\"managerID\" value=\"$managerID\" style=\"display:none;\">"
                        ?>
                    <label class="marginLabel">Hotel-phone</label>
                    <input type="text" name="hotelPhone" class="form-control item">
                </div>

                <div class="form-group displayField arrow">
                    <label class="marginLabel">City</label>
                    <select name="city" class="form-control item">
                        <option value="Tafila">Tafila</option>
                        <option value="Amman">Amman</option>
                        <option value="Irbid">Irbid</option>
                        <option value="Ajloun">Ajloun</option>
                        <option value="Madaba">Madaba</option>
                        <option value="Karak">Karak</option>
                    </select>
                </div>

                

                <div class="form-group displayField">
                    <label class="marginLabel">Number of rooms</label>
                    <input type="number" name="num_rooms" class="form-control">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary create-account">Submit</button>
                    </div>


            </form>
        </div>
    </div>
</body>

</html>