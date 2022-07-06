<?php 

include "./repeats/header.php";

?>
    <section id="one">
        <div id="oneleft">
            <h1 id="heading">Events</h1>
            <p id="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, qui eaque necessitatibus eius quos voluptate distinctio aliquid deleniti voluptatem odit dignissimos possimus minima dolorem ab natus in enim corporis eum!</p>
        </div>
        <div id="oneright">
            <img src="images/eventsImage.png" alt="evenst_image">
        </div>
    </section>
    <section id="two">
            <div id="two1" class="x">Centerstage</div>
            <div id="two2">Departmental</div>
            <div id="two3">Talks</div>
    </section>
    <script>
      $(document).ready(function(){
        $("#two div").click(function(){
          $(this).addClass("x").siblings().removeClass("x"); //for buttton highlighting
          //--------------
          $("#centerstage").removeClass("shower"); //for removing centerstage on 1st click
          if(this.id=="two1"){
            $("#centerstage").addClass("shower").siblings().removeClass("shower");
          }else if(this.id=="two2"){
            $("#departments").addClass("shower").siblings().removeClass("shower");
          }else{
            $("#talks").addClass("shower").siblings().removeClass("shower");
          }
          //--------------
        });
      });
    </script>
    <section id="three">
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <div id="centerstage" class="shower">centerstage</div>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <div id="departments" class="">
            <div id="dfilters">
              <button id="all" class="x" data-filter="all">ALL</button>
              <button id="cse" data-filter="cse">Cse</button>
              <button id="ece" data-filter="ece">Ece</button>
              <button id="chem" data-filter="chem">Chem</button>
              <button id="civil" data-filter="civil">Civil</button>
              <button id="mech" data-filter="mech">Mech</button>
            </div>
            <div id="cards_container">
              <script>var patch = '<div class="card cse"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span class="text">cse</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<3;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card ece"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span class="text">Electronic and Communication</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<3;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card chem"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span class="text">chem</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<4;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card civil"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span class="text">civil</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<10;i++){document.write(patch);}</script>
              <script>var patch = '<div class="card mech"><button class="viewmore">View Details</button><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span class="text">mech</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';for(var i=0;i<3;i++){document.write(patch);}</script>
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
            <!------------CARD--------------->
            <script>
              $("#dfilters button").click(function(){
                var value = $(this).attr("data-filter");
                $(this).addClass("x").siblings().removeClass("x");
                if(this.id == "all"){
                  $("#cards_container .card").show("50");
                }else{
                  $("#cards_container .card").not('.'+value).hide("50");
                  $("#cards_container .card").filter('.'+value).show("50");
                }
              });
            </script>
        </div>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <div id="talks">
            <span id="thead">Talks</span>
            <div id="guests">
                <script>
                    var patch = '<div id="guestCard"><button class="viewmore">View Details</button><div id="gctop"><img src="images/elon.jpg" alt="guest_pic"></div><div id="gcbottom"><div id="gcbt"><span id="name">Elon Musk</span><span id="designation">Founder of SpaceX, Paypal</span></div><div id="gcbb"><h6>Topic:</h6><span id="tdesc">lorem ipsum thathum mammamm goem poem pora thuyyam</span></div></div></div>';
                    for(var i=0;i<4;i++){document.write(patch);}
                </script>
                <!------------GUEST_CARD--------------->
                <!-- <div id="guestCard">
                    <button class="viewmore">View Details</button>
                    <div id="gctop">
                        <img src="images/elon.jpg" alt="guest_pic">
                    </div>
                    <div id="gcbottom">
                        <div id="gcbt">
                            <span id="name">Elon Musk</span>
                            <span id="designation">Founder of SpaceX, Paypal</span>
                        </div>
                        <div id="gcbb">
                            <h6>Topic:</h6>
                            <span id="tdesc">lorem ipsum thathum mammamm goem poem pora thuyyam</span>
                        </div>
                    </div>
                </div> -->
                <!------------GUEST_CARD--------------->
            </div>
        </div>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    </section>
    <script>
      $(".viewmore").click(function(){
        window.location.href = "event_info.php";
      });
    </script>
</body>
</html>