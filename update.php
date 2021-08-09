<?php 

$db = mysqli_connect('localhost','root','','projetpfe');
$option = mysqli_query($db, "SELECT pseudo FROM mentor");
$errors = array();

$titre = '';
$message  = '';
$pseudo_mentor = '';
$start = '';
$end = '';
$id = 0;

if (isset($_GET['update'])) {
    $id = $_GET['id'];
    $record = $db->query("SELECT * FROM rendez_vous where id =$id");
  
    if (count($record) == 1) {
      $row = $record->fetch_array();
        $titre = $row[3];
    }
  }

?>



<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap 4 Sidebar Menu Responsive with Sub menu Create Responsive Side Navigation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style-index.css">
</head>
<style>
    .container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: white;
        margin-top: 15px;
        box-shadow: 0 0 5px rgba(0, 0, 0, .5);
        position: relative;
        overflow: hidden;
        min-height: 780px;
        max-height: 780px;
        padding: 60px 50px 0px 50px;
    }
</style>

<body>

    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <!-- <img loading="lazy" src="" alt="" width="100" height="100" class="mr-3 rounded-circle img-thumbnail shadow-sm"> -->
                <div class="media-body">
                    <h4 class="m-0"><?php echo "OTHMANE" ?></h4>
                    <p class="font-weight-normal text-muted mb-0">Etudiant</p>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    home
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark bg-light">
                    <i class="fa fa-calendar mr-3 text-primary fa-fw"></i>
                   update d'un rendez-vous
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-calendar-check-o mr-3 text-primary fa-fw"></i>
                    Rendez-vous Acceptes
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-calendar-times-o mr-3 text-primary fa-fw"></i>
                    Rendez-vous Refuses
                </a>
            </li>
        </ul>
    </div>

    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
        <a href="login_etudiant.php?logout='1'" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 float-sm-right" role="button" aria-pressed="true"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <h2 class="display-6 text-white">Mise A jour Votre Rendez_vous</h2>
        <form method="post">

            <?php include('errors.php'); ?>

            <div class="container">

                <div class="form-group">
                    <label for="disabledTextInput">Votre Nom</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?php echo "othmane"; ?>" name="pseudo_etudiant">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Titre</label>
                    <input type="text" id="disabledTextInput" class="form-control" name="titre" value="<?php echo $titre; ?>">
                </div>

                <div class="form-group">
                    <label for="validationCustom03">Mentor</label>
                    <?php

                    echo "<select name='pseudo_mentor' class='form-control' >";

                    echo "<option value='0'>Select a mentor</option>";
                    while ($row = mysqli_fetch_array($option)) {

                        echo "<option value='" . $row['pseudo'] . "'>" . $row['pseudo'] . "</option>";
                    }
                    echo "</select>";

                    ?>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date Debut</label>
                    <input class="form-control" type="datetime-local" value="" id="example-datetime-local-input" name="start">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date Fin</label>
                    <input class="form-control" type="datetime-local" value="" id="example-datetime-local-input" name="end">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Message</label>
                    <textarea class="form-control" id="exampleTextarea" rows="3" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="reserver">Reserver</button>
            </div>
        </form>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
</body>

</html>
