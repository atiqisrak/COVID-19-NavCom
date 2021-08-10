<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="COVID-19 Registration by NavCom">
    <meta name="author" content="Atiq Israk">
    <meta name="keywords" content="COVID-19 Registration by NavCom">

    <!-- Title Page-->
    <title>COVID-19 Registration by NavCom</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <!-- Navbar Starts -->
    <Header>
        <div class="nav-holder bg-gra-04">
            <a href="http://navana.com/"><img src="navana_logo.png" alt="Navana Official Logo"></a>
        </div>
    </Header>
    <!-- Navbar Ends -->
    <!-- Main Page -->
    <div class="page-wrapper bg-gra-03 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">

                    <?php

                        $office_id = $_POST['office_id'];
                        $employee_name = $_POST['name'];
                        $concern_name = $_POST['concern_name'];
                        $nid = $_POST['nid'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $vaccinated = $_POST['vaccinated'];
                        $first_dose = $_POST['first_dose'];
                        $second_dose = $_POST['second_dose'];
                        $reg_date = $_POST['reg_date'];

                        // Converting Date to DateTime format
                        if (!empty($first_dose)) {
                            $first_dose = date('Y-m-d', strtotime($first_dose));
                        } 

                        if (!empty($second_dose)) {
                            $second_dose = date('Y-m-d', strtotime($second_dose));
                        }

                        if (!empty($reg_date)) {
                            $reg_date = date('Y-m-d', strtotime($reg_date));
                        }


                        // Dependencies:
                        require "includes/db.php";


                        // Check if user already registered
                        try {
                            //Get db class
                            $pdo = new db();

                            //Connect to db
                            $pdo = $pdo->connect();
                            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

                            $sql = "SELECT nid FROM Vaccinated WHERE nid = :nid";

                            $query = $pdo->prepare($sql);
                            $query->bindParam(':nid', $nid, PDO::PARAM_STR);
                            $query->execute();
                            $resultArray = $query->fetch(PDO::FETCH_ASSOC);

                        } catch (PDOException $e){
                            echo 'Error: ' . $e->getMessage();
                        }	
                            
                        if(!ISSET($resultArray['nid'])){              // Insert New Entry
                            try {
                                //Get db class
                                $pdo = new db();

                                //Connect to db
                                $pdo = $pdo->connect();

                                $sql = "INSERT INTO Vaccinated(office_id, employee_name, concern_name, nid, email, phone, vaccinated, first_dose, second_dose, reg_date)
                                        VALUES(:office_id, :employee_name, :concern_name, :nid, :email, :phone, :vaccinated, :first_dose, :second_dose, :reg_date)";

                                $query = $pdo->prepare($sql);

                                $query->bindParam(':office_id', $office_id, PDO::PARAM_STR);
                                $query->bindParam(':employee_name', $employee_name, PDO::PARAM_STR);
                                $query->bindParam(':concern_name', $concern_name, PDO::PARAM_STR);
                                $query->bindParam(':nid', $nid, PDO::PARAM_STR);
                                $query->bindParam(':email', $email, PDO::PARAM_STR);
                                $query->bindParam(':phone', $phone, PDO::PARAM_STR);
                                $query->bindParam(':vaccinated', $vaccinated, PDO::PARAM_STR);
                                $query->bindParam(':first_dose', $first_dose, PDO::PARAM_STR);
                                $query->bindParam(':second_dose', $second_dose, PDO::PARAM_STR);
                                $query->bindParam(':reg_date', $reg_date, PDO::PARAM_STR);

                                $query->execute();

                                if (!$query){
                                    echo 'Error: ' . $e->getMessage();
                                } else {
                                    echo 'Your entry has been added!';
                                }

                            } catch (PDOException $e){
                                echo 'Error: ' . $e->getMessage();
                            }


                        } else {                        // Update Entry
                            
                            try {
                                //Get db class
                                $pdo = new db();
                            
                                //Connect to db
                                $pdo = $pdo->connect();
                            
                                $sql = "UPDATE Vaccinated SET office_id = :office_id, employee_name = :employee_name, concern_name=:concern_name, 
                                        email = :email, phone = :phone, vaccinated=:vaccinated, first_dose=:first_dose,  second_dose=:second_dose, reg_date=:reg_date
                                        WHERE nid = :nid";
                            
                                $query = $pdo->prepare($sql);
                            
                                $query->bindParam(':office_id', $office_id, PDO::PARAM_STR);
                                $query->bindParam(':employee_name', $employee_name, PDO::PARAM_STR);
                                $query->bindParam(':concern_name', $concern_name, PDO::PARAM_STR);
                                $query->bindParam(':nid', $nid, PDO::PARAM_STR);
                                $query->bindParam(':email', $email, PDO::PARAM_STR);
                                $query->bindParam(':phone', $phone, PDO::PARAM_STR);
                                $query->bindParam(':vaccinated', $vaccinated, PDO::PARAM_STR);
                                $query->bindParam(':first_dose', $first_dose, PDO::PARAM_STR);
                                $query->bindParam(':second_dose', $second_dose, PDO::PARAM_STR);
                                $query->bindParam(':reg_date', $reg_date, PDO::PARAM_STR);
                            
                                $query->execute();
                            
                                if (!$query){
                                    echo 'Error: ' . $e->getMessage();
                                } else {
                                    echo 'Your entry has been updated!';
                                }
                            
                            } catch (PDOException $e){
                                echo 'Error: ' . $e->getMessage();
                            }

                        }



                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>



    <div class="copyright">
        <h2>Powered By </h2>
        <a href="http://navcom.agency"><img src="navana_communication_logo.png" alt="Navana Communication"></a>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
</html>
<!-- end document-->


