<?php
include('server_etudiant.php');
$pseudo = $_SESSION["pseudo"];
if (empty($_SESSION['pseudo'])) {
 header('location:login_etudiant.php');
}
$db = mysqli_connect('localhost', 'root', '', 'projetpfe') or die("Error!!");
$option = mysqli_query($db, "SELECT pseudo FROM mentor");
$errors = array();

if (isset($_POST['reserver'])) {

    $titre = mysqli_real_escape_string($db, $_POST['titre']);
    $start = mysqli_real_escape_string($db, $_POST['start']);
    $end = mysqli_real_escape_string($db, $_POST['end']);
    $message = mysqli_real_escape_string($db, $_POST['message']);
    $pseudo_mentor = mysqli_real_escape_string($db, $_POST['pseudo_mentor']);
    $startDateTime=date('Y-m-d H:i:s',strtotime($start));
    $endDateTime=date('Y-m-d H:i:s',strtotime($end));

    if (empty($titre)) {
        array_push($errors, "Titre est requis");
    }
    if (empty($message)) {
        array_push($errors, "Message est requis");
    }
    if (empty($pseudo_mentor)) {
        array_push($errors, "Mentor est requis");
    }
    
  
    $now = date_create()->format('Y-m-d H:i:s');
    $hourNow = date("H:i",strtotime($now));
    $hourStart =date("H:i",strtotime($startDateTime));
    $hourEnd=date("H:i",strtotime($endDateTime));
    $dateStart =date("Y-m-d",strtotime($startDateTime));
    $dateEnd =date("Y-m-d",strtotime($endDateTime));

    if( $dateStart != $dateEnd || $dateStart < $dateEnd ){
        array_push($errors, "date debut doit etre inferieur a la date du fin et dans dans le meme jour");
    }
    if($hourEnd < $hourStart){
        array_push($errors, "Merci de verifier les heures");
    }
    if($startDateTime < $now || $endDateTime < $now){
        array_push($errors, "les date doit etre dans le futur ");
    }


    if(count($errors)==0){
        $sql = "INSERT into rendez_vous values(0,'$pseudo','$pseudo_mentor','$titre','$message','En cours','$startDateTime','$endDateTime')";
        mysqli_query($db, $sql);
        header('location:demandes.php');
        // if ($db->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $db->error;
        // }
    }
}
$id='';
$titre='';
$update = false;
$debut='';
$fin ='';
$message='';
$pseudo_etudiant='';
$start='';
$end='';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $db->query("SELECT * FROM rendez_vous where id=$id");
    while($row = mysqli_fetch_array($result)){
        $id = $row[0];
        $pseudo_etudiant = $row[1];
        $titre = $row[3];
        $mentor = $row[2];
        $message = $row[4];
        $start = $row[6];
        $end = $row[7];
        $debut = date("Y/d/m H:i", strtotime($start));
        $fin = date("Y/d/m H:i", strtotime($end));
       $update=true;
    }
  }

  if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($db, $_POST['id']);
    $titre = mysqli_real_escape_string($db, $_POST['titre']);
    $start = mysqli_real_escape_string($db, $_POST['start']);
    $end = mysqli_real_escape_string($db, $_POST['end']);
    $message = mysqli_real_escape_string($db, $_POST['message']);
    $pseudo_mentor = mysqli_real_escape_string($db, $_POST['pseudo_mentor']);
    $startDateTime=date('Y-m-d H:i:s',strtotime($start));
    $endDateTime=date('Y-m-d H:i:s',strtotime($end));

    if (empty($titre)) {
        array_push($errors, "Titre est requis");
    }
    if (empty($message)) {
        array_push($errors, "Message est requis");
    }
    if (empty($pseudo_mentor)) {
        array_push($errors, "Mentor est requis");
    }
    
    $now = date_create()->format('Y-m-d H:i:s');
    $hourNow = date("H:i",strtotime($now));
    $hourStart =date("H:i",strtotime($startDateTime));
    $hourEnd=date("H:i",strtotime($endDateTime));
    $dateStart =date("Y-m-d",strtotime($startDateTime));
    $dateEnd =date("Y-m-d",strtotime($endDateTime));


    if( $dateStart != $dateEnd || $dateStart < $dateEnd ){
        array_push($errors, "date debut doit etre inferieur a la date du fin et dans dans le meme jour");
    }
    if($hourEnd < $hourStart){
        array_push($errors, "Merci de verifier les heures");
    }
    if($startDateTime < $now || $endDateTime < $now){
        array_push($errors, "les date doit etre dans le futur ");
    }

    if(count($errors)==0){
        $sql1 = "UPDATE rendez_vous SET titre='$titre',message='$message' , pseudo_mentor='$pseudo_mentor' ,  debut='$startDateTime' , fin='$endDateTime' WHERE id=$id";
        mysqli_query($db, $sql1);
        mysqli_close($db);
        header('location:demandes.php');
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Espace Etudiant</title>
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

    
     <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center"> 
                 <!-- <img loading="lazy" src="" alt="" width="100" height="100" class="mr-3 rounded-circle img-thumbnail shadow-sm"> -->
                <div class="media-body">
                    <h4 class="m-0"><?php echo "Bonjour ",$pseudo ?></h4>
                    <p class="font-weight-normal text-muted mb-0">Etudiant</p>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Tableau de bord
</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="index_etudiant.php" class="nav-link text-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Accueille
                </a>
            </li>
            <li class="nav-item">
                <a href="rendez_vous.php" class="nav-link text-dark bg-light">
                    <i class="fa fa-calendar mr-3 text-primary fa-fw"></i>
                    Prenez un rendez-vous
                </a>
            </li>
            <li class="nav-item">
      <a href="demandes.php" class="nav-link text-dark">
                <i class="fa fa-calendar-check-o mr-3 text-primary fa-fw"></i>
                Mes Demandes
            </a>
    </li>
        </ul>
    </div>

    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
        <a href="login_etudiant.php?logout='1'" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 float-sm-right" role="button" aria-pressed="true"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <h2 class="display-6 text-white">Prenez Votre Rendez_vous</h2>
        <form method="post">

            <?php include('errors.php'); ?>

            <div class="container">
            <div class="form-group">
                    <input type="hidden" id="disabledTextInput" class="form-control" placeholder="" value="<?php echo $id ?>" name="id">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Votre Nom</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?php echo $pseudo; ?>" name="pseudo_etudiant" disabled>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Titre</label>
                    <input type="text" id="disabledTextInput" class="form-control" name="titre" value ="<?php echo $titre ?>">
                </div>

                <div class="form-group">
                    <label for="validationCustom03">Mentor</label>
                    <?php

                    echo "<select name='pseudo_mentor' class='form-control' >";
                    if($update == true){
                        echo "<option value='"   . $mentor . "'>" .    $mentor . "</option>";
                    }else{
                    echo "<option value='0'>Select a mentor</option>";
                }
                    while ($row = mysqli_fetch_array($option)) {

                        echo "<option value='" . $row['pseudo'] . "'>" . $row['pseudo'] . "</option>";
                    }
                    echo "</select>";

                    ?>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date Debut</label>
                    <input placeholder=" Date Debut" class="form-control" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" id="start" name="start" value="<?php echo $debut ?>">
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">Date Fin</label>
                    <input placeholder=" Date Fin" class="form-control" type="text" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" id="end" name="end" value="<?php echo $fin ?>">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Message</label>
                    <?php
                    if ($update == true) {
                        echo "<textarea class='form-control' id='exampleTextarea' rows='3' name='message' value=''>$message</textarea>";
                    } else {
                        ?>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="message" value=""></textarea>
                        <?php
                    }
                    ?><br><br>
                       <?php
                    if ($update == true) {
                        echo "<button type='submit' class='btn btn-primary' name='update'>Mettre a jour</button>";
                    } else {
                        ?>
                <button type="submit" class="btn btn-primary" name="reserver">Reserver</button>
                <?php
                    }
                    ?>
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

