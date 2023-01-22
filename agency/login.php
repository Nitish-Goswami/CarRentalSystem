<?php   include('../include/Header.php');    ?>

<div class="container mt-5">
  <h1>Agency Login Form</h1>
  <?php if (isset($_GET['error'])) { ?>

<p id="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
  <form method="post" action="Controller.php">
    <div class="mb-3">
      <label for="AgencyEmail" class="form-label">Email address</label>
      <input
        type="email"
        class="form-control"
        id="AgencyEmail"
        name="AgencyEmail"
        required
      />
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
    <button type="submit" class="form-control btn btn-primary" name="Login" value="login">Login</button>
  <p>New User ?</p>
        <button type="submit" class="btn btn-primary" href="register.php">Register</button>
        
  </form>
</div>

<?php   include('../include/Footer.php');    ?>  