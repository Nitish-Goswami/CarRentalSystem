<?php

    include '../config/Database.php';

    session_start();

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"]))
    {
        $name = validate($_POST["AgencyName"]);
        $email = validate($_POST["AgencyEmail"]);
        $phone = validate($_POST["AgencyPhone"]);
        $password = password_hash(validate($_POST["AgencyPassword"]),PASSWORD_DEFAULT);

        // Check wheter email is already registred or not
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM agency WHERE email = '$email'"))){
            header("Location: register.php?error=Email is already registred with us.");
            exit();
        }
        else{
            $sql = "INSERT INTO `agency`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";

            if (mysqli_query($conn, $sql)) {
                echo json_encode(['msg' => 'Data Inserted Successfully!', 'status' => true]);
                header("Location: ./index.php");
            
            } else {
                echo json_encode(['msg' =>mysqli_error($conn), 'status' => false]);
                }
        }
        
        
    }


    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Login"]))
    {
        $email = $_POST["AgencyEmail"];

        $sql = "SELECT * from agency where email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >= 1) {
            
            $row = mysqli_fetch_assoc($result);
            if(password_verify($_POST["AgencyPassword"],$row["password"])){
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['isAgencyLoggedIn'] = true;
                header("Location: ./index.php");
                exit();
            }
            else{
                header("Location: login.php?error=Wrong Password");
                exit();
            }
           
        }
        else{
            header("Location: register.php?error=Wrong Email");
                exit();
        }
    }


    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ListCar"]))
    {
       
        $modelName = validate($_POST["ModelName"]);
        $vehicleNo = validate($_POST["VehicleNo"]);
        $seatingCapacity = validate($_POST["SeatingCapacity"]);
        $rentPerDay = validate($_POST["RentPerDay"]);
        $agencyID = $_SESSION['id'];       
       

        $sql = "INSERT INTO `vehicle`(`agencyID`, `model_name`, `number`, `seating_capacity`, `rentperday`,`isBooked`) VALUES ('$agencyID','$modelName','$vehicleNo',$seatingCapacity,$rentPerDay,'No')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ./index.php");
                exit();
            echo json_encode(['msg' => 'Data Inserted Successfully!', 'status' => true]);
            // header("Location: ../index.php");
        
        }
    }
?>