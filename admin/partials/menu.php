<html>
    <?php session_start();?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/343ba3ba83.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" rel="stylesheet">
    <title>Blood Donation</title>
</head>

<body>
    <div class="menu">
        
        <h3>Blood Donation Institue</h3>
        <div class="wrapper1">

            <ul>
                <li><a href="../index.php">Home</a></li>
                <?php  if (!isset($_SESSION['username'])) {
                    echo "<li><a href='../connexion.html'>Connexion</a></li>" ;
                } ?>
                
                <li><a href="contact.html">Contact</a></li>
                <li><a href="">About us</a></li>
                <?php  if (isset($_SESSION['username'])) {
                    echo "<li><a href='../admin/admin-dashboard.php' >".$_SESSION['username']."</a></li>"."<li><a href='partials\logout.php'>"."Logout"."</a></li>" ;
                } ?>
            </ul>
        </div>

    </div>