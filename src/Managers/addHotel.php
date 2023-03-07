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
						<a class="nav-link" href="/Managers/managersLoginPage.php?managerID=<?php echo $_GET["managerID"];?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href='addHotel.php?managerID=<?php echo $_GET["managerID"];?>'>Add Hotel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href='manageReservation.php?managerID=<?php echo $_GET["managerID"];?>'>Manage My
                            Hotel's Reservations</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href='modifyHotel.php?managerID=<?php echo $_GET["managerID"];?>'>Modify My Hotels</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href='reports.php?managerID=<?php echo $_GET["managerID"];?>'>Reports</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href='#'>Sign out</a>
					</li>
				</ul>
			</div>
		</nav>
    </header>


    <div>
        <div class="registration-form">
            <form action="/Managers/createHotel.php" method="POST">
                <div class="form-group displayField ">
                    <label class="marginLabel">Hotel Name</label>
                    <input type="text" name="hotelName" class="form-control item">
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