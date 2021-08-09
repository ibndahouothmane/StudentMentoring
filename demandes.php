<?php
include('server_etudiant.php');
$pseudo = $_SESSION["pseudo"];
if (empty($_SESSION['pseudo'])) {
    header('location:login_etudiant.php');
}
$db = mysqli_connect('localhost', 'root', '', 'projetpfe') or die("Error!!");
$query = mysqli_query($db, "SELECT * FROM rendez_vous where pseudo_etudiant='$pseudo'");
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

  if (count($errors) == 0) {
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

if (isset($_POST['deletedata'])) {
  $id = $_POST['delete_id'];
  $sql = "DELETE FROM rendez_vous where id='$id'";
  $query_d = mysqli_query($db, $sql);
  if ($query_d) {
    header('location:demandes.php');
  } else {
    echo '<script>alert("Y\'un probleme")</script>';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Espace Etudiant</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style-index.css">
    <style>
    .container {
      padding: 2rem 0rem;
    }

    h4 {
      margin: 2rem 0rem 1rem;
    }

    .table td th {

      vertical-align: middle;
      text-align: center;
    }

    .table td:nth-of-type(2),
    .table td:nth-of-type(5) {
      display: none;
    }
  </style>
</head>
<body>
 
<!-- Vertical navbar -->
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
      <a href="rendez_vous.php" class="nav-link text-dark">
                <i class="fa fa-calendar mr-3 text-primary fa-fw"></i>
                Prenez un rendez-vous
            </a>
    </li>
    <li class="nav-item">
      <a href="demandes.php" class="nav-link text-dark bg-light">
                <i class="fa fa-calendar-check-o mr-3 text-primary fa-fw"></i>
                Mes Demandes
            </a>
    </li>
  </ul>
</div>

<div class="page-content p-5" id="content">
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
  <a href="login_etudiant.php?logout='1'" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 float-sm-right" role="button" aria-pressed="true"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
  <h2 class="display-6 text-white">Mes demandes</h2>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Pseudo Mentor</th>
              <th scope="col">Titre</th>
              <th scope="col">Date Debut</th>
              <th scope="col">Date Fin</th>
              <th scope="col">Statut</th>

              <th scope="col">Actions</th>
            </tr>
          </thead>
          <?php
          while ($row = mysqli_fetch_array($query)) {
            $stat = '';
            if ($row[5] == "En cours") {
              $stat = 'warning';
            } else if ($row[5] == "Accepter") {
              $stat = 'success';
            } else if ($row[5] == "Refuser") {
              $stat = 'danger';
            }
            echo '<tbody>';
            echo "<tr>";
            echo "<td style='vertical-align: middle' scope='col'>$row[0]</td>";
            echo "<td style='vertical-align: middle'>$row[1]</td>";
            echo "<td style='vertical-align: middle'>$row[2]</td>";
            echo "<td style='vertical-align: middle'>$row[3]</td>";
            echo "<td style='vertical-align: middle'>$row[4]</td>";
            echo "<td style='vertical-align: middle'>$row[6]</td>";
            echo "<td style='vertical-align: middle'>$row[7]</td>";
            echo "<td style='vertical-align:middle;text-align:center'><span class='badge badge-$stat 'style='padding :5px 5px 5px 5px;'>$row[5]</span></td>";
            echo "<td style='vertical-align: middle;text-align:center'>";
            //echo "<button type='button' class='btn btn-primary'><i class='fa fa-eye'></i></button>&nbsp";
            echo "<a class='btn btn-success' href='rendez_vous.php?id=$row[0]' role='submit' name='editbtn'><i class='fa fa-edit'></i></a>&nbsp";
            echo "<button type='button' class='btn btn-danger deletebtn' name='deletebtn'><i class='fa fa-trash'></i></button>";
            echo "</td>";
            echo "</tr>";
            echo "</tbody>";
          }

          ?>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class='fa fa-plus'></i></button>

      </div>
    </div>
  </div>
  <!-- delete -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Suppresion de la demande</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <input type="hidden" class="form-control" placeholder="" value="" name="delete_id" id="delete_id">
          <div class="modal-body">
            <h5>Vous voulez vraiment supprimer cette demande?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" name="deletedata" class="btn btn-primary">Oui</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ajout -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">

            <?php include('errors.php'); ?>

            <div class="container">

              <div class="form-group">
                <label for="disabledTextInput">Votre Nom</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?php echo $pseudo; ?>" name="pseudo_etudiant" disabled>
              </div>
              <div class="form-group">
                <label for="disabledTextInput">Titre</label>
                <input type="text" id="disabledTextInput" class="form-control" name="titre">
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
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary" name="reserver">Ajouter</button>
        </div>
        </form>
      </div>
    </div>
  </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('.deletebtn').on('click', function() {
      $('#exampleModaldelete').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      console.log(data);
      $('#delete_id').val(data[0]);

    });

  });
</script>
</body>
</html>
