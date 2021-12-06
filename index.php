<!DOCTYPE html>
<?php  
session_start();
session_destroy();

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/343ba3ba83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" rel="stylesheet">
    <title>Blood Donation</title>
</head>

<body>
    <div class="menu">
        <img src="logo.png" class="logo">
        <h3>Blood Donation</h3>
        <div class="wrapper1">

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="connexion.html">Connexion</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="">About us</a></li>
            </ul>
        </div>

    </div>
    <div class="contenent">
        <div class="img-contenet">
            <div class="text-in-img">
                <h4>We need more blood donors </h4>
                <p>Please book an appointment to donate.</p>
            </div>
        </div>
        <div class="regiter-box">
            <div class="box-reg ">
                Become a blood donor <i class="far fa-plus-square"></i>
                <br />
                <br />If you are completely new to blood donation
                <br />
                <br />
                <a href="">Register</a>
            </div>
            <div class="box-reg ">
                Already a blood donor? &nbsp;<i class="far fa-plus-square"></i> <br />
                <br />Sign up for an online account to manage appointments
                <br />
                <br />
                <a href="new-account.html">Create an account</a>
            </div>
            <div class="what">A blood donation occurs when a person voluntarily has blood drawn and used for transfusions and/or made into biopharmaceutical medications by a process called fractionation (separation of whole blood components). Donation may be of whole blood,
                or of specific components directly (apheresis). Blood banks often participate in the collection process as well as the procedures that follow it</div>
        </div>
        <br>
        <div class="wrapper">
            <h1>News</h1>
            <div class="box text-align-center">
                <h2>Le premier article</h1>
                    <br /> description
            </div>
            <div class="box text-align-center">
                <h2>Le premier article</h1>
                    <br /> description
            </div>
            <div class="box text-align-center">
                <h2>Le premier article</h1>
                    <br /> description
            </div>
            <div class="box text-align-center">
                <h2>Le premier article</h1>
                    <br /> description
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer">
        <div class="wrapper1">
            <div class="text-align-center">
                <p>
                Projet Web 2021-2022
                </p>
            </div>
        </div>

    </div>
</body>






</html>