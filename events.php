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
            <div id="two1" class="x" onclick="colorchanger(this.id);">Centerstage</div>
            <div id="two2" class="x" onclick="colorchanger(this.id);">Departmental</div>
            <div id="two3" class="x" onclick="colorchanger(this.id);">Talks</div>
    </section>
    <script>
        function colorchanger(id){
            document.getElementsByClassName('x').background='unset';
            document.getElementsByClassName('x').color='white';
            //----
            document.getElementById(id).style.background='#19d2a6';
            document.getElementById(id).style.color='black';
        }
    </script>
    <section id="three">
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <div id="departments" style="display: none;">
            <script>
                var patch = '<div class="card"><div id="cardtop"><img src="images/card_back.jpg" alt="card_back"></div><div id="cardbottom"><span id="text">Electronic and Communication</span><span id="logo"><span style="color:#19d2a6;">></span>></span></div></div>';
                for(var i=0;i<10;i++){document.write(patch);}
            </script>
            <!------------CARD--------------->
            <!-- <div class="card">
                <div id="cardtop">
                    <img src="images/card_back.jpg" alt="card_back">
                </div>
                <div id="cardbottom">
                    <span id="text">Electronic and Communication</span>
                    <span id="logo"><span style="color:#19d2a6;">></span>></span>
                </div>
            </div>-->
            <!------------CARD--------------->
        </div>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <div id="talks">
            <span id="thead">Talks</span>
            <div id="guests">
                <script>
                    var patch = '<div id="guestCard"><button id="viewmore">View Details</button><div id="gctop"><img src="images/elon.jpg" alt="guest_pic"></div><div id="gcbottom"><div id="gcbt"><span id="name">Elon Musk</span><span id="designation">Founder of SpaceX, Paypal</span></div><div id="gcbb"><h6>Topic:</h6><span id="tdesc">lorem ipsum thathum mammamm goem poem pora thuyyam</span></div></div></div>';
                    for(var i=0;i<4;i++){document.write(patch);}
                </script>
                <!------------GUEST_CARD--------------->
                <!-- <div id="guestCard">
                    <button id="viewmore">View Details</button>
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
        <div id="filter3"></div>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    </section>
</body>
</html>