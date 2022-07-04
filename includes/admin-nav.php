<?php 
    include "./includes/getBack.php";
?>

<style>
    .navbar-expand-lg .navbar-collapse {
        justify-content: flex-end !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #bccad5;">
  <p>Hello, <span style="text-transform:uppercase; font-weight:600;"><?php echo $user;?></span></p>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="dashboard.php">Home</a>
      <?php 
        if($user!='organizer' && $user!='w_organizer'){
            echo "<a href='addUsr.php' class='nav-item nav-link'>Add user</a>";
        }
      ?>
      <a class="nav-item nav-link" href="passChange.php">Change password</a>
      <a class="nav-item nav-link" href="logout.php">logout</a>
    </div>
  </div>
</nav>