<?php 
    include "./includes/header.php";
    include "./includes/getBack.php";
    include "./includes/nav.php";
    include "./includes/connect.php";
?>

<?php

// password change
if (isset($_POST['change'])){
  $current = $new = '';

  $current = md5($_POST['currentPass']);
  $new = md5($_POST['newPass']);

  $query = "SELECT * FROM adminusrs WHERE usrRole='$user' AND usrEmail='$email'";
  $response = mysqli_query($connection,$query);

  if(mysqli_num_rows($response) > 0){
    $row = mysqli_fetch_assoc($response);
    if($row['usrPwd']==$current){     
      $query2 = "UPDATE adminusrs SET usrPwd='$new' WHERE usrRole='$user' AND usrEmail='$email'";
      mysqli_query($connection,$query2);
      echo "<div class='alert alert-success' role='alert'>Password successfully changed!</div>";
    }
    else{
          echo "<div class='alert alert-danger' role='alert'>Wrong Password entered!</div>";
    }   
  }
  else{
    echo "<div class='alert alert-danger' role='alert'>Couldn't change password!</div>";
  }
  
}

?>

<br />
    <center>
      <p>Create strong password</p>
    </center>
    <div class="center">
      <form method="post" action="#">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="Current password"
            name="currentPass"
            required
          />
        </div>
        <br />
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Set new password" name="newPass" required/>
        </div>
        <br />
        <input type="submit" class="btn btn-primary" name="change" value="Change"></input>
      </form>
    </div>

<?php 

include "includes/footer.php"

?>