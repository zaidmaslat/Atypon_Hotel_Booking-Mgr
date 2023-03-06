<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/managersLoginPage.css">
</head>

<body>
    <Main>
        <br><br><br><br><br>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <div class="section_our_solution">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category">
                        <div class="solution_cards_box">
                            <div class="solution_card flexCard">
                                <div class="hover_color_bubble"></div>
                                <div class="solu_title">
                                </div>
                                <div class="solu_description">
                                    <h3>
                                        <a class="link" href='addHotel.php?managerID=<?php $_GET['managerID'];?>'>Add Hotel</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="solution_card flexCard ">
                                <div class="hover_color_bubble"></div>
                                <div class="solu_description">
                                    <h3>
                                        <a class="link" href='manageReservation.php?managerID=<?php $_GET['managerID'];?>'>Manage My
                                            Hotel's Reservations</a>
                                    </h3>

                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="solution_cards_box sol_card_top_3">
                            <div class="solution_card flexCard">
                                <div class="hover_color_bubble"></div>
                                <div class="solu_description">
                                    <h3>

                                        <a class="link" href='modifyHotel.php?managerID=<?php $_GET['managerID'];?></a>'>Modify My Hotels</a>
                                    </h3>
                                </div>
                            </div>

                            <div class="solution_card flexCard">
                                <div class="hover_color_bubble"></div>
                                
                                <div class="solu_description">
                                    <h3>

                                        <a class="link" href='reports.php?managerID=<?php $_GET['managerID'];?></a>'>Reports</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </Main>

</body>

</html>