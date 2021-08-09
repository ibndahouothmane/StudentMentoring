<?php include('server_etudiant.php');
$pseudo = $_SESSION["pseudo"];
if (empty($_SESSION['pseudo'])) {
    header('location:login_etudiant.php');
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
      <a href="index_etudiant.php" class="nav-link text-dark bg-light">
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
