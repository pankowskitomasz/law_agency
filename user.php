<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();   
}

include_once "php/comm.php";
include_once "php/db.php";
include_once "php/t_text_list.php";
include_once "php/t_message.php";
include_once "php/t_user.php";

//to remove after pub
//include_once "php/support.php";
//createAdminAccount("password","admin@mussodent.com","9731");

if(isset($_POST["username"])
&& isset($_POST["userpass"])){
    DatabaseConnect();
    $usr = new TUser($GLOBALS['connection']);   
    $usr->getByName(htmlspecialchars($_POST["username"]));
    if($usr->getData("username")===htmlspecialchars($_POST['username'])
    && $usr->getData("password")===sha1(htmlspecialchars($_POST['userpass']))
    ){
        $_SESSION["UserLogged"] = $usr->getData("username");
    }
}

if(isset($_SESSION["UserLogged"])){
    //reading view config
    if(isset($_POST["login"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["cases"])){
        $_SESSION["view"] = "cases";
    }
    if(isset($_POST["caseinfo"])){
        $_SESSION["view"] = "caseinfo";
    }
    if(isset($_POST["casesearch"])){
        $_SESSION["view"] = "casesearch";
    }
    if(isset($_POST["dashboard"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["editcase"])){
        $_SESSION["view"] = "editcase";
    }
    if(isset($_POST["edituser"])){
        $_SESSION["view"] = "edituser";
    }
    if(isset($_POST["msginfo"])){
        $_SESSION["view"] = "msginfo";
    }
    if(isset($_POST["msgsearch"])){
        $_SESSION["view"] = "msgsearch";
    }
    if(isset($_POST["messages"])){
        $_SESSION["view"] = "messages";
    }
    if(isset($_POST["users"])){
        $_SESSION["view"] = "users";
    }
    if(isset($_POST["logout"])){
        $_SESSION["view"] = "logout";
    }    
    //template selection and config
    if(isset($_SESSION["view"])){
        switch($_SESSION["view"]){
            case "cases":
                $_SESSION["viewTemplate"] = "templates/tmp_cases.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "caseinfo":
                $_SESSION["viewTemplate"] = "templates/tmp_case_info.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "casesearch":
                $_SESSION["viewTemplate"] = "templates/tmp_cases.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "dashboard":
                $_SESSION["viewTemplate"] = "templates/tmp_dashboard.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "editcase":
                $_SESSION["viewTemplate"] = "templates/tmp_editcase.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "edituser":
                $_SESSION["viewTemplate"] = "templates/tmp_edituser.php";
                break;
            case "msginfo":
                $_SESSION["viewTemplate"] = "templates/tmp_message_info.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msgsearch":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "messages":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "users":
                $_SESSION["viewTemplate"] = "templates/tmp_users.php";
                $_SESSION["CurrentPage"]=1;
                break;
            default: 
                $_SESSION["viewTemplate"] = "templates/tmp_login.php";     
                $_SESSION = array();
                session_destroy(); 
        }
    }
}
else{
    $_SESSION["viewTemplate"] = "templates/tmp_login.php";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styles.min.css">
    <title>Law Firm | Login</title>
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
    <main>
        <?php
        if(isset($_SESSION["viewTemplate"])){
            include $_SESSION["viewTemplate"]; 
        }
        else{
            include "templates/tmp_login.php";                            
        }
        ?>
    </main>   
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