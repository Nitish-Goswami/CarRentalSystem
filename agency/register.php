<?php   include('../include/Header.php');    ?>

    <div class="container mt-5">
      <h1>Agency Signup Form</h1>
      <?php if (isset($_GET['error'])) { ?>

<p id="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
      <form method="POST" action="Controller.php" >
        <div class="mb-3">
          <label for="AgencyName" class="form-label">Your name</label>
          <input
            type="text"
            class="form-control"
            id="AgencyName"
            name="AgencyName"
            required
          />
        </div>
        <div class="mb-3">
          <label for="AgencyEmail" class="form-label">Email address</label>
          <input
            type="email"
            class="form-control"
            id="AgencyEmail"
            name="AgencyEmail"
            onFocus="document.getElementById('message').innerHTML = '' ;"
            required
          />
          <div id="emailHelp" class="form-text">
            We'll never share your email with anyone else.
          </div>
        </div>
        <div class="mb-3">
          <label for="AgencyPhone" class="form-label">Contact No.</label>
          <input
            type="text"
            class="form-control"
            id="AgencyPhone"
            name="AgencyPhone"
            required
          />
          <div id="emailHelp" class="form-text">
            We'll never share your modbile no. with anyone else.
          </div>
        </div>
        <div class="mb-3">
          <label for="AgencyPassword" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="AgencyPassword"
            name="AgencyPassword"
            pattern="[A-Za-z]{4)"
            required
          />
        </div>
        <button type="submit" name="register" class="form-control btn btn-primary" value="register">
          Register
        </button>
        
        
      </form>
      <p>Already Registered ?</p>
      <a href="login.php" class="btn btn-primary">Login</button>
      
    </div>
    <?php   include('../include/Footer.php');    ?>  