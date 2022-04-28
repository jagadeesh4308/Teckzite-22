<?php 

include "./includes/header.php";
include "./includes/getBack.php";
include "./includes/connect.php";

if($user=='organizer'){
  header("Location:dashboard.php");
}

?>

<?php 


include "./includes/nav.php";

$typeCanAdd = '';
$defaultPwd = generatePwd(6);
$defaultPwd = md5($defaultPwd);
$userPriority = 0;


function generatePwd($length) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);

}

if($user=="convenor") {
  $typeCanAdd = "manager";
  $userPriority = 2;
}
else if($user=="manager") {
  $typeCanAdd = "coordinator";
  $userPriority = 3;
}
else if($user=="coordinator") {
  $typeCanAdd = "organizer";
  $userPriority = 4;
} 

?>


<?php

// user adding
if (isset($_POST['add'])){
  $username = $useremail = '';

  $username = strtolower($_POST['username']);
  $useremail = strtolower($_POST['useremail']);

  $query1 = "SELECT * FROM adminusrs WHERE usrName='$username@$typeCanAdd' OR usrEmail='$useremail'";
  $response = mysqli_query($connection,$query1);

  if(mysqli_num_rows($response) > 0){
    echo "<div class='alert alert-danger' role='alert'>User already existed!</div>";
  }
  else{
    if($typeCanAdd=='organizer'){
      $dept = $pieces[0];
      if($dept == 'cse') $tag = 'TZCS0';
      else if($dept == 'ece') $tag = 'TZEC0';
      else if($dept == 'civil') $tag = 'TZCE0';
      else if($dept == 'mech') $tag = 'TZME0';
      else if($dept == 'chem') $tag = 'TZCHE0';
      else if($dept == 'mme') $tag = 'TZMME0';
      else if($dept == 'puc') $tag = 'TZPUC0';
      $nOfrows = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM competitions WHERE eveDepartment='$dept'"));
      $tag = $tag.(string)($nOfrows+1);
      mysqli_query($connection,"INSERT INTO competitions(eveID,eveName,eveDepartment) VALUES('$tag','$username','$dept')");
    }
    $query3 = "INSERT INTO adminusrs(usrEmail,usrRole,usrName,usrPwd,usrPriority) VALUES('$useremail' , '$typeCanAdd' , '$username@$typeCanAdd', '$defaultPwd' , '$userPriority')";
    $response3 = mysqli_query($connection,$query3);
    echo "<div class='alert alert-success' role='alert'>User successfully added!</div>";
  }
  
}

?>

<br><br>

    <center>
      <p style="padding: 0 10px;"><?php if($typeCanAdd=='organizer') echo "Entered event name taken as ".$typeCanAdd." default user name"; else echo "The user you can add is ".$typeCanAdd; ?></p>
    </center>
    <div class="center">
      <form method="post" action="#">
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="<?php if($typeCanAdd=='organizer') {echo "Enter event name";} else{echo "Set user name";} ?>"
            name="username"
            required
          />
        </div>
        <br />
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Enter valid email" name="useremail" required/>
        </div>
        <br />
        <input type="submit" class="btn btn-primary" name="add" value="Add"></input>
      </form>
    </div>

<?php 

include "./includes/footer.php";

?>