<?php 

include "./repeats/header.php";
include "./includes/connect.php";

?>
    <section id="main_container">
        <section id="one" class="wone">
            <div id="oneright">
                <img src="images/eventsImage.png" alt="evenst_image">
            </div>
            <div id="oneleft">
                <h1 id="heading">Workshops</h1>
                <p id="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, qui eaque necessitatibus eius quos voluptate distinctio aliquid deleniti voluptatem odit dignissimos possimus minima dolorem ab natus in enim corporis eum!</p>
            </div>
        </section>
        <section id="three" class="wthree">
                <div id="cards_container">


                        <?php 
                        
                            $response = mysqli_query($connection,"SELECT * FROM workshops");
                            if(mysqli_num_rows($response)>0){
                                while($row = mysqli_fetch_assoc($response)){
                                    $fetchedEvent = $row['workshopName'];
                                    $fetchedDept = $row['workshopDept'];
                                    $fetchedimg = $row['workshopImg'];

                                    echo "<div class='card $fetchedDept'>
                                                <button class='viewmore'>
                                                    <a href='workshop_info.php?id=$fetchedEvent'>View more</a>
                                                </button>
                                                <div id='cardtop'> "; ?> 
                                                
                                                <?php 
                                                
                                                if($fetchedimg==NULL){
                                                    echo "<img src='images/card_back.jpg' alt='card_back'>";
                                                }
                                                else{
                                                    echo "<img src='images/$fetchedimg' alt='card_back'>";
                                                }
                                                
                                                
                                                echo "</div>
                                                <div id='cardbottom'>
                                                    <span class='text'>$fetchedEvent</span>
                                                    <span id='logo'><span style='color:#19d2a6;'>></span>></span>
                                                </div>
                                            </div>";
                                }
                            }
                
                        ?>
                
                </div>
        </section>
    </section>
</body>
</html>
<?php
include "repeats/footer.php";
?>
