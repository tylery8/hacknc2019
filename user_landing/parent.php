<!-- //MY FILE -->
<?php
  session_start();
?>

<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>Safe Wallet</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navgition navgition-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="assets/images/logo.svg" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#service">REQUESTS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">CHILDREN</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="logout.php" style="color: red">LOGOUT</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->

        <div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/header-bg.jpg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="header-content text-center">
                            <h3 class="header-title">Welcome <?php echo "{$_SESSION['first']}" ?></h3>
                            <p class="text">Here you can create your child's account, keep an eye on their spending, or add funds to you childs account</p>
                            <ul class="header-btn">
                                <li><a class="main-btn btn-one" rel="nofollow" href="https://rebrand.ly/start-ud">ADD CHILD</a></li>
                                
                            </ul>
                        </div> <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="assets/images/header-shape.svg" alt="shape">
            </div>
        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="service" class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" align="center">
                    <div class="section-title" style="align-content:center">
                        <h4 class="title" style="text-align: center">Request</h4>
                        <p class="text" style="text-align: center">Here are all of the requests your children have made.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

            <?php 

                //loop through all dependents
                $conn = new mysqli('localhost', 'root', '', 'registration_storage');
                $sql ="SELECT * FROM dependents WHERE parent_u_name = '$_SESSION[username]' ";

                $result = mysqli_query($conn, $sql);
                $numRows = mysqli_num_rows($result);
                //see if there are any contests under this user
                if($numRows > 0){
                    echo "<p>You have created <b>". $numRows. "</b> challenges. To create a new contest, click below! </br></a>.</p>";
                }
                else{
                    echo "<p>You have not yet created a contest. Create a new contest to gain access to our resources! </br></a>.</p>";
                }

            ?>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="single-pricing mt-40">
                        <div class="pricing text-center" style="z-index: 99;">
                            <h5 class="sub-title" style="z-index: 99;">***NAME***</h5>
                        </br>
                            <h5 class="sub-title" style="z-index: 99;"> ***$Request Amount***</h5>
                        </br>
                            <h5 class="sub-title" style="z-index: 99;">***STORE FOR REQUEST***</h5>
                        </div>
                        <div class="pricing-list">
                            
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#">ADD FUNDS</a>
                        </div>
                        <div align="center">
                            <p class="main-btn" href="#">DECLINE</p>
                        </div>
                    </div> <!-- single pricing -->
                </div>
            </div> <!-- row -->



        </div>
    </section>
    <!--====== SERVICES PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    <section id="pricing" class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h4 class="title">My Children</h4>
                        <p class="text">Helping you teach your children financial literacy by setting budgets for them</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="single-pricing mt-40">
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">***NAME***</h5>
                            <span class="price"> ***$Current Balance***</span>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle" style="z-index: 99;"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle" style="z-index: 99;"></i> Amazing page examples</li>
                                <li><i class="lni-check-mark-circle" style="z-index: 99;"></i> Super friendly support team</li>
                                <li><i class="lni-check-mark-circle" style="z-index: 999;"></i> Awesome Support</li>
                            </ul>
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#">ADD FUNDS</a>
                        </div>
                        <div class="buttom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-1{fill:#2bdbdc;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-1" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-1" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-1" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-1" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                
                
            </div> <!-- row -->
        </div> <!-- conteiner -->
    </section>

    <!--====== PRICING PART ENDS ======-->
    


    
    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-logo-support d-md-flex align-items-end justify-content-between">
                            <div class="footer-logo d-flex align-items-end">
                                <a class="mt-30" href="index.html"><img src="assets/images/logo.svg" alt="Logo"></a>

                                <ul class="social mt-30 text">
                                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                </ul>
                            </div> <!-- footer logo -->
                            
                        </div> <!-- footer logo support -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-link text">
                            <h3 class="footer-title title">Company</h6>
                            <ul class= "copyright">
                                <li class="text">About</li>
                                <li class="text">Contact</li>

                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-link text">
                            <h3 class="footer-title text">Contact Us</h6>
                            <ul class="copyright">
                                <li class="text">(123) 456-7890</li>
                                <li class="text">100 Stadium Dr.</li>
                                <li class="text">Chapel Hill, NC 27514</li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text">Template Crafted by Big Baller Analytics</p>
                        </div>
                    </div>
                </div> <!-- row -->
             <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->









    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="assets/js/ajax-contact.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>

    <!--====== Validator js ======-->
    <script src="assets/js/validator.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>