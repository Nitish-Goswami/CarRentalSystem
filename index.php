<?php
session_start();
include './config/Database.php';
?>

<?php   include('./include/Header.php');    ?>
<?php   include('./include/Navbar.php');    ?>
<div class="container mt-5">


   
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Welcome <?php if(isset($_SESSION['isAgencyLoggedIn']) || isset($_SESSION['isCustLoggedIn'])) echo $_SESSION['name']; ?></h1>
    <p class="lead">We are the leading Car Renting Company in India.Our compnay goal is to provide safe and secure journey.
        We have all top cars maintained by our well certified mechanics.
    </p>
  </div>
</div>

    <div class="row">

   
    <?php
        $btnOfBook = '<a href="customer/login.php" class="btn btn-primary">Login to Book</a>';
        $sql = "select * from vehicle where isBooked = 'No'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
          //mysqli_fetch_all gives us the data in 2D array format.
          // It's second parameter decide whether its assoc array or indexed. Or maybe both
           while($row = mysqli_fetch_assoc($result)){
            if(isset($_SESSION["isCustLoggedIn"]))
            {
                        $btnOfBook = '<a href="booking.php?id='.$row['id'].'" class="btn btn-primary">Book</a>';
            }
            ?>
                <div class="card col-sm-12 mx-3 px-3" style="width: 25rem;">
                    <img class="card-img-top" src="./include/car.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['model_name'] ?></h5>
                        <p class="card-text">This is your only chance to grab this running deal.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Seating Capacity : <?php echo $row['seating_capacity'] ?></li>
                        <li class="list-group-item">Rent Per Day : <?php echo $row['rentperday'] ?> Rs.</li>
                        <li class="list-group-item">Vehicle No : <?php echo $row['number'] ?></li>
                    </ul>
                    <div class="card-body">
                        <?php echo $btnOfBook ?>
                    </div>
                </div>
            <?php
           }
        
        } else {
          echo '<h1>Sorry for inconvenience. All cars have been booked.</h1>';
        }
    ?>
     </div>
     </div>

<?php   include('./include/Footer.php');    ?>    
