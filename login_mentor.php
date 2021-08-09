<?php include('server_mentor.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-mentor-login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Se Connecter Mentor</title>
</head>

<body>
    <div class="navbar">
        <label class="logo" href="index.html">Mentoring</label>
        <ul class="nav-menu">
        <li><a href="index.html">HOME</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Services</a></li>
        </ul>
        <ul class="nav-espace">
            <li><a class="mentor" href="login_mentor.php">ESPACE MENTOR</a></li>
            <li><a class="etudiant" href="login_etudiant.php">ESPACE ETUDIANT</a></li>
        </ul>
    </div>
    <div class="titre-mentor">
        <h3>ESPACE MENTOR</h3>
    </div>
    <form action="login_mentor.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
            
                    <div id="first">

                        <div class="myform form ">
                        <?php include('errors.php'); ?>
                            <div class="logo mb-3">
                                <div class="col-md-12 text-center">
                                    <h1>Login</h1>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="example-email-input" class="col-6 col-form-label">Email</label>
                                <div class="col-12">
                                    <input class="form-control form-control-sm" type="email" placeholder="othmane@example.com" id="example-email-input" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-password-input" class="col-6 col-form-label">Mot De passe</label>
                                <div class="col-12">
                                    <input class="form-control form-control-sm" type="password" placeholder="Mot De passe" id="example-password-input" name="password" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12 text-center">
                                    <a href="register_mentor.php" style="color: red;font-weight: bold;">S'inscrire?</a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input style="background-color: #fd7e14;border:none" type="submit" name="login" value="Se Connecter" class="btn btn-primary" >
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>