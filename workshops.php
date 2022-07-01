<?php 

include "./repeats/header.php";

?>
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
              <script>var patch = '<div class="card cse"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span id="text">cse</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<3;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card ece"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span id="text">Electronic and Communication</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<3;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card chem"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span id="text">chem</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<4;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card civil"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span id="text">civil</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<10;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card mech"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span id="text">mech</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<3;i++){document.write(patch);}</script>
            </div>
            <!------------CARD--------------->
            <!-- <div class="card cse">
                <div id="cardtop">
                    <img src="images/card_back.jpg" alt="card_back">
                </div>
                <div id="cardbottom">
                    <span id="text">Electronic and Communication</span>
                    <span id="logo"><span style="color:#19d2a6;">></span>></span>
                </div>
            </div> -->
    </section>
    <script>
      $(".viewmore").click(function(){
        window.location.href = "event_info.php";
      });
    </script>
</body>
</html>