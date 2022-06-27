<?php 
    include "./includes/admin-header.php";
    include "./includes/getBack.php";
    include "./includes/admin-nav.php";
    include "./includes/connect.php";
?>

<style>

    .heightClass {
        width: 600px;
        height: 200px;
    }
    .eveimage{
      width:100px;
      height:100px;
      padding:1em 0.5em;
    }

@media (max-width: 720px) {
  .heightClass {
    width: 400px;
  }
}
@media (max-width: 420px) {
  .heightClass {
    width: 300px;
  }
}

.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
  text-transform: uppercase;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.panel {
  background-color: white;
  display: none;
  overflow: hidden;
}

.accordion:after {
  content: '\02795'; 
  font-size: 12px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; 
}


</style>

<?php 

if($user=='coordinator'){
    echo "<br><center>Department of <b style='text-transform:uppercase;'>".$pieces[0]."</b></center></br>";

    //fetch details
    $fetchedEvent = '';
    $fetchedAbout = '';   
    $fetchedstructure = '';
    $fetchedtimeline = '';
    $fetchedfaq = '';
    $fetchedRules = '';
    $fetchedcontact = '';
    $fetchedimg = '';
    $fetchedsponimg = '';
    $response = mysqli_query($connection,"SELECT * FROM competitions WHERE eveDepartment='$pieces[0]'");
    if(mysqli_num_rows($response)>0){
        while($row = mysqli_fetch_assoc($response)){
            $fetchedEvent = $row['eveName'];
            $fetchedAbout = $row['about'];
            $fetchedstructure = $row['structure'];
            $fetchedtimeline = $row['timeline'];
            $fetchedfaq = $row['faq'];
            $fetchedRules = $row['rules'];
            $fetchedcontact = $row['contact_info'];
            $fetchedimg = $row['eveImg'];
            $fetchedsponimg = $row['sponImg'];
            echo "<center><button class='accordion'> <b>$fetchedEvent</b> </button>
                  <div class='panel'>
                  <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='About' disabled> $fetchedAbout </textarea>
                     </div> 
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Rules' disabled> $fetchedstructure </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Timeline' disabled> $fetchedtimeline </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='FAQs' disabled> $fetchedfaq </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Rules' disabled> $fetchedRules </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Contact' disabled> $fetchedcontact </textarea>
                     </div>
                  </div><br></center>";
                  if ($fetchedimg){
                    echo "<img src='images/$fetchedimg' class='eveimage'>";
                  }
                  if ($fetchedsponimg){
                    echo "<img src='images/$fetchedsponimg' class='eveimage'>";
                  }
        }
    }

}


if($user=='manager' && $pieces[0]=='events'){
    echo "<br><center>Manager of <b style='text-transform:uppercase;'>".$pieces[0]."</b></center></br>";

    $depts = array("cse",'ece','civil','mech','chem','mme','puc');
    $fetchedEvent = '';
    $fetchedAbout = '';   
    $fetchedstructure = '';
    $fetchedtimeline = '';
    $fetchedfaq = '';
    $fetchedRules = '';
    $fetchedcontact = '';
    $fetchedimg = '';
    $fetchedsponimg = '';
    foreach($depts as $dept){
        $response = mysqli_query($connection,"SELECT * FROM competitions WHERE eveDepartment='$dept'");
        if(mysqli_num_rows($response)>0){
            echo "<center>From Department of <b style='text-transform:uppercase;'>$dept</b></center><br><br>";
            while($row = mysqli_fetch_assoc($response)){
                $fetchedEvent = $row['eveName'];
                $fetchedAbout = $row['about'];
                $fetchedstructure = $row['structure'];
                $fetchedtimeline = $row['timeline'];
                $fetchedfaq = $row['faq'];
                $fetchedRules = $row['rules'];
                $fetchedcontact = $row['contact_info'];
                $fetchedimg = $row['eveImg'];
                $fetchedsponimg = $row['sponImg'];
                echo "<br><br><center><button class='accordion'> <b>$fetchedEvent</b> </button>
                    <div class='panel'>
                    <br>
                        <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='About' disabled> $fetchedAbout </textarea>
                     </div> 
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Rules' disabled> $fetchedstructure </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Timeline' disabled> $fetchedtimeline </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='FAQs' disabled> $fetchedfaq </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Rules' disabled> $fetchedRules </textarea>
                     </div>
                     <br>
                     <div class='form-group'>
                         <textarea class='form-control heightClass' placeholder='Contact' disabled> $fetchedcontact </textarea>
                     </div>
                    </div><br></center>";
                    if ($fetchedimg){
                      echo "<img src='images/$fetchedimg' class='eveimage'>";
                    }
                    if ($fetchedsponimg){
                      echo "<img src='images/$fetchedsponimg' class='eveimage'>";
                    }
            }
        }
        echo "<br>";
    }

}



//giving editing oppurtunity to organizer
if($user=='organizer'){
    include "addEvent.php";
}

?>


<script>

let acc = document.querySelectorAll('.accordion');

for (let i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");

    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

</script>
