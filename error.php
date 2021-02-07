<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["errorMessage"])){
    $_SESSION["errorMessage"] = "Unfortunately your message was not send due to technical ";
    $_SESSION["errorMessage"] .= "problems. Please try again later or contact with us by phone.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styles.min.css">
    <title>Law Firm | Error</title>
</head>
<body class="bg-secondary">
    <header class="container-fluid px-0 border-bottom border-dark text-shadow">
        <nav class="navbar navbar-expand-md nabvar-dark bg-secondary">
            <a href="index.html" class="navbar-brand">
                <img src="img/navbar_logo.png" alt="logo"/>
                <span class="navbar-text font-logo font-italic text-white">
                    Law <span class="text-primary">Firm</span>
                </span>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav ml-auto text-uppercase">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="case-studies.html" class="nav-link">Case studies</a>
                    </li>
                    <li class="nav-item">
                        <a href="services.html" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="appointments.html" class="nav-link">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="user.php" class="nav-link">
                            <span class="fa fa-user-o"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="contact-s1 align-items-center d-flex container-fluid text-shadow bg-secondary minh-30vh border-bottom border-primary">
    </section>
    <section class="container-fluid d-flex py-3 minh-50vh bg-white">
        <div class="my-auto text-center text-md-left px-md-5 w-100">               
            <div class="col-10 col-sm-8 col-md-6 offset-1 offset-sm-2 offset-md-3 text-center">
                <div class="alert alert-danger">
                    <h3 class="text-center font-header">Error!</h3>
                    <p class="initialism">
                        <?php
                            echo $_SESSION["errorMessage"];
                        ?>
                    </p>                  
                    <a href="appointments.html" 
                        class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-s2 align-items-center d-flex container text-shadow bg-secondary minh-30vh py-5">
        <div class="row w-100 mx-0">
            <div class="col-12 col-sm-4">
                <ul class="list-unstyled text-white text-center text-sm-left">
                    <li>
                        <span class="text-primary fa fa-map-marker"></span> 
                        Office location
                    </li>
                    <li class="ml-4 small">
                        Newtown CA,
                    </li>
                    <li class="ml-4 small">
                        Merry Str. 74/12
                    </li>
                </ul>                        
            </div>
            <div class="col-12 col-sm-4">
                <ul class="list-unstyled text-white text-center text-sm-left">
                    <li>
                        <span class="text-primary fa fa-map-marker"></span> 
                        Headquaters location
                    </li>
                    <li class="ml-4 small">
                        New York WA,
                    </li>
                    <li class="ml-4 small">
                        40-th Str. 12, 10th floor
                    </li>
                </ul>                        
            </div>
            <div class="col-12 col-sm-4">
                <ul class="list-unstyled text-white text-center text-sm-left">
                    <li>
                        <span class="text-primary fa fa-clock-o"></span> 
                        Opening hours
                    </li>
                    <li class="ml-4 small">
                        Mon - Fri (8:00- 20:00)
                    </li>
                </ul>                        
            </div>
            <div class="col-12 col-sm-4">
                <ul class="list-unstyled text-white text-center text-sm-left">
                    <li>
                        <span class="text-primary fa fa-phone"></span> 
                        Free Consultation
                    </li>
                    <li class="ml-4 small">
                        +(01) 789 456 789
                    </li>
                </ul>                           
            </div>
            <div class="col-12 col-sm-4">
                <ul class="list-unstyled text-white text-center text-sm-left">
                    <li>
                        <span class="text-primary fa fa-envelope"></span> 
                        Email Us
                    </li>
                    <li class="ml-4 small">
                        office&#64;lawfirm.lw
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <footer class="container-fluid bg-secondary text-center text-white p-3 border-top border-primary">
        <small class="my-0">
            Copyright &copy; 2020-2021 Tomasz Pankowski. All rights reserved.
            <a class="text-white" href="privacy.html">Privacy policy</a>
        </small>
    </footer>
    <div class="modal fade" id="privacyModal">
        <div class="modal-dialog font-header">
            <div class="modal-content border-green p-2">
                <div class="modal-header text-center">
                    <h4 class="font-header text-green font-weight-bold">GPDR Declaration</h4>
                    <a href="#privacyModal" 
                        data-target="#privacyModal"
                        data-dismiss="modal"
                        class="close text-green">
                        &times;
                    </a>
                </div>
                <div class="modal-body">
                    <p class="initialism">
                        This website is a <span class="text-danger"> demo version </span> of real website,  It doesn't collect and process,
                        in long term meaning (longer than needed for website operation during visitor's
                        presence), any user (visitor) data.
                    </p>
                    <p class="initialism pt-2">
                        All information collected during visitor's 
                        presence on this website is used only for technical purposes, required for 
                        correct operation of website or demonstration purposes related to technical 
                        mechanisms and presentation of its operation... 
                        <a href="privacy.html" class="text-green font-weight-bold">More about privacy</a>
                    </p>                        
                    <p class="initialism pt-2">
                        If you accept privacy policy please click button "accept". If you 
                        refuse it, leave page by closing it in your web browser, please.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-dark mx-auto"
                        onclick="acceptPrivacyPolicy()">
                        Accept
                    </button>
                </div>
            </div>
        </div>
    </div>  
    <script src="js/main.min.js"></script>
</body>
</html>