<?php   include('../include/Header.php');    ?>

<div class="container mt-5">
  <h1>Customer Login Form</h1>
  <?php if (isset($_GET['error'])) { ?>

<p id="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
  <form method="post" action="Controller.php">
    <div class="mb-3">
      <label for="CustomerEmail" class="form-label">Email address</label>
      <input
        type="email"
        class="form-control"
        id="CustomerEmail"
        name="CustomerEmail"
        required
      />
      <div class="mb-3">
        <label for="CustomerPassword" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="CustomerPassword"
          name="CustomerPassword"
          required
        />
      </div>
    <button type="submit" class="form-control btn btn-primary" name="Login" value="login">Login</button>
  <p>New User ?</p>
        <a  class="btn btn-primary" href="register.php">Register</a>
        
  </form>
</div>

<?php   include('../include/Footer.php');    ?>  