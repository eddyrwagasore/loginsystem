<?php

require_once("header.php");
echo display_session_message();
echo display_session_authErrors();
?>
<section class="container-fluid homefirstcont pt-5 " id="homefirstcont">
    <div class="row  justify-content-between align-items-center">
        <div class="col-12 col-sm-4  text-center one animate__animated animate__fadeInLeft">
            <img src="assets/images/olsunrespect.jpg" class="img-fluid" class="img-responsive img-fluid">
        </div>
        <div class="col-12 col-sm-8 bg-white py-4 two animate__animated animate__fadeInRight">

            <h1 class="second animate__animated animate__fadeInDownBig">Mission</h1>
            <p class="third ">Our Mission is To fulfill the commission that Jesus Christ gave to His followers to go into
                the world and make disciples of all people. Our purpose is to save the lost and to build up and
                encourage those who are already believers. We pledge to our viewers & supporters to take all the Gospel
                to all the world and to all generations.</p>
        </div>
    </div>
</section>

<section class="container-fluid bg-light">
    <div class="row align-items-center">
        <div class="col">

            <section id="features" class="services-area pt-10">
                <div class="container">
                    <div class="row justify-content-center scrl">
                        <div class="col-lg-10">
                            <div class="section-title mt-5 text-left pb-10">
                                <h3 class="title"> About Us</h3>
                            </div> <!-- section title -->
                        </div>
                    </div> <!-- row -->
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-6 col-lg-4 left_anim">
                            <div class="single-services text-center mt-30 " data-wow-duration="1s"
                                data-wow-delay="0.2s">
                                <div class="services-icon">
                                    <img src="assets/images/jesus.jpg" class="img-fluid" alt="shape">

                                </div>
                                <div class="services-content mt-30">
                                    <h4 class="services-title">THE LORD JESUS CHRIST</h4>
                                    <p class="text">We believe in the deity of Jesus Christ as the only begotten Son of
                                        God. We believe in His substitutionary death for all men, His resurrection, and
                                        His eventual return to judge the world.</p>
                                </div>
                            </div> <!-- single services -->
                        </div>
                       
                        <div class="col-10 col-md-6 col-lg-4 top_anim">
                            <div class="single-services text-center mt-30 " data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <div class="services-icon">
                                    <img src="assets/images/salvation.jpg" class="img-fluid" alt="shape">

                                </div>
                                <div class="services-content mt-30">
                                    <h4 class="services-title">SALVATION</h4>
                                    <p class="text">We believe all are born with a sinful nature and that the work of
                                        Christ’s atonement at the Cross was to redeem us from the power of sin. We
                                        believe that this salvation from sin is available to all who are willing to
                                        receive it through the prayer of salvation.</p>
                              </div>
                            </div> <!-- single services -->
                        </div>
                        <div class="col-10 col-md-6 col-lg-4 right_anim">
                            <div class="single-services text-center mt-30 " data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <div class="services-icon">
                                    <img src="assets/images/holyspirit.jpg" class="img-fluid" alt="shape">

                                </div>
                                <div class="services-content mt-30">
                                    <h4 class="services-title">THE HOLY SPIRIT</h4>
                                    <p class="text">We believe in the Holy Spirit as the third person of the Trinity.
                                        The Trinity consists of God the Father, Jesus His Son and the Holy Spirit. We
                                        believe in the Baptism of the Holy Spirit, and the comforting interaction of the
                                        Holy Spirit with man.</p>
                                </div>
                            </div> <!-- single services -->
                        </div>

                    </div> <!-- row -->
                </div> <!-- container -->
                <a href="about.php"><button class=" btn-info d-table mx-auto m-5 p-4"> More About Us</button></a>
            </section>
        </div>
</section>

<script>
                            $(window).scroll(function() {
                        var hT = $('.scrl').offset().top,
                            hH = $('.scrl').outerHeight(),
                            wH = $(window).height(),
                            wS = $(this).scrollTop();
                        if (wS > (hT+hH-wH)){
                            $('.left_anim').addClass("animate__animated animate__backInLeft")
                            $('.top_anim').addClass("animate__animated animate__backInDown")
                            $('.right_anim').addClass("animate__animated animate__backInRight")
                        }
                        });

                        </script>



<?php
include("footer.php");
?>