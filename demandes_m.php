<?php
include('server_mentor.php');
$pseudo = $_SESSION["pseudo"];
if (empty($_SESSION['pseudo'])) {
    header('location:login_mentor.php');
}
$db = mysqli_connect('localhost', 'root', '', 'projetpfe') or die("Error!!");
$query = mysqli_query($db, "SELECT * FROM rendez_vous where pseudo_mentor='$pseudo'");
$option = mysqli_query($db, "SELECT pseudo FROM mentor");
$errors = array();

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

if (isset($_POST['acceptdata'])) {
  $id = $_POST['id_accept'];
  $sql = "UPDATE rendez_vous SET statut='Accepter' WHERE id='$id'";
  $query_d = mysqli_query($db, $sql);
  if ($query_d) {
    header('location:demandes_m.php');
  } else {
    echo '<script>alert("Y\'un probleme")</script>';
  }

}

if (isset($_POST['refusedata'])) {
  $id = $_POST['id_refuse'];
  $sql = "UPDATE rendez_vous SET statut='Refuser' WHERE id='$id'";
  $query_d = mysqli_query($db, $sql);
  if ($query_d) {
    header('location:demandes_m.php');
  } else {
    echo '<script>alert("Y\'un probleme")</script>';
  }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Espace Mentor</title>
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
        <p class="font-weight-normal text-muted mb-0">Mentor</p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Tableau de Bord</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="index_mentor.php" class="nav-link text-dark">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Aceuille
            </a>
    </li>
    <li class="nav-item">
      <a href="calendar_mentor.php" class="nav-link text-dark">
                <i class="fa fa-calendar mr-3 text-primary fa-fw"></i>
                Calendrier
            </a>
    </li>
    <li class="nav-item">
      <a href="demandes_m.php" class="nav-link text-dark bg-light">
                <i class="fa fa-calendar-check-o mr-3 text-primary fa-fw"></i>
                Mes Demandes
            </a>
    </li>
  </ul>
</div>

<div class="page-content p-5" id="content">
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>
  <a href="login_etudiant.php?logout='1'" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 float-sm-right" role="button" aria-pressed="true"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
  <h2 class="display-6 text-white">Mes Demandes</h2>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Pseudo Etudiant</th>
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
            echo "<td style='vertical-align: middle'>$row[2]</td>";
            echo "<td style='vertical-align: middle'>$row[1]</td>";
            echo "<td style='vertical-align: middle'>$row[3]</td>";
            echo "<td style='vertical-align: middle'>$row[4]</td>";
            echo "<td style='vertical-align: middle'>$row[6]</td>";
            echo "<td style='vertical-align: middle'>$row[6]</td>";
            echo "<td style='vertical-align:middle;text-align:center'><span class='badge badge-$stat' style='padding :5px 5px 5px 5px;'>$row[5]</span></td>";
            echo "<td style='vertical-align: middle;text-align:center'>";
            //echo "<button type='button' class='btn btn-primary'><i class='fa fa-eye'></i></button>&nbsp";
            echo "<a class='btn btn-success acceptbtn' role='button' name='accept'>Accepter</a>&nbsp&nbsp&nbsp";
            echo "<a class='btn btn-danger defusebtn' role='button' name='refuse'>Refuser</a>";
            echo "</td>";
            echo "</tr>";
            echo "</tbody>";
          }

          ?>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">accept de la demande</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <input type="hidden" class="form-control" placeholder="" value="" name="id_accept" id="id_accept">
          <div class="modal-body">
            <h5>Vous voulez vraiment accepter cette demande?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" name="acceptdata" class="btn btn-primary">Oui</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Refuse de la demande</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <input type="hidden" class="form-control" placeholder="" value="" name="id_refuse" id="id_refuse">
          <div class="modal-body">
            <h5>Vous voulez vraiment refuser cette demande?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" name="refusedata" class="btn btn-primary">Oui</button>

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
$(document).ready(function() {
    $('.acceptbtn').on('click', function() {
      $('#exampleModal').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      console.log(data);
      $('#id_accept').val(data[0]);

    });

  });
$(document).ready(function() {
    $('.defusebtn').on('click', function() {
      $('#exampleModal2').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      console.log(data);
      $('#id_refuse').val(data[0]);

    });

  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
