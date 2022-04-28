<?php 

include "./includes/header.php";
include "./includes/connect.php";

?>

<?php

// user login
if (isset($_POST['login'])){
  $user = $pwd = '';

  $user = strtolower($_POST['username']);
  $pwd = md5($_POST['password']);

  $query = "SELECT * FROM adminusrs WHERE usrName='$user' AND usrPwd='$pwd'";
  $response = mysqli_query($connection,$query);

  if(mysqli_num_rows($response) > 0){
    $row = mysqli_fetch_assoc($response);
    session_start();
    $_SESSION['name'] = $row["usrName"];
    $_SESSION['user'] = $row["usrRole"];
    $_SESSION['email'] = $row["usrEmail"];
    header("Location: dashboard.php");
  }
  else{
    echo "<div class='alert alert-danger' role='alert'>User not existed or Incorrect details!</div>";
  }
  
}

?>

<style>
  body{
    background: aliceblue;
  }
</style>


<br /><br />
    <center>
      <h2>Welcome ADMIN,</h2>
      <p>Please LOGIN to proceed</p>
    </center>
    <div class="center">
      <form method="post" action="#">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="Enter user name"
            name="username"
            required
          />
        </div>
        <br />
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" required/>
        </div>
        <br />
        <input type="submit" class="btn btn-primary" name="login"></input>
      </form>
    </div>


<?php 

include "./includes/footer.php";

?>
